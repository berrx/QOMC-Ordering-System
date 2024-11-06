<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Exceptions\InvalidRequestException;
use Carbon\Carbon;
use App\Http\Requests\SendReviewRequest;
use App\Events\OrderReviewed;
use App\Http\Requests\ApplyRefundRequest;
use App\Exceptions\CouponCodeUnavailableException;
use App\Models\Cart;
use App\Models\CouponCode;
use App\Models\OrderItem;
use App\Models\ProductSku;

class OrdersController extends Controller
{

    public function pay(Request $request)
    {
        $userid = $request->userid;
        $mealsTime = $request->mealsTime;
        $people = $request->people;
        $leave = $request->leave;
        $pay_type = $request->pay_type;


        if ($pay_type == "微信支付") {
            $payment_method = 'wechat';
        } else {
            $payment_method = 'alipay';
        }

        $payment_no = date('YmdHis') . mt_rand(100, 999);

        $cartItems = Cart::where('user_id', $request->userid)->with('product')->get();
        $cartBody = [];
        $totalPrice = 0;
        $total = 0;
        foreach ($cartItems as $key => $value) {
            $cartBody[] = [
                'name' => $value->product->title,
                'price' => $value->product->price,
                'desc' => $value->product->description,
                'product_id' => $value->product->id,
                'quantity' => $value->quantity,
            ];
            $totalPrice = bcadd($totalPrice, bcmul($value->quantity, $value->product->price));
        }
        // 开启事务
        \DB::beginTransaction();
        try {
            // 创建订单
            $order = Order::create([
                'user_id' => $userid,
                'address' => '店内就餐',
                'total_amount' => $totalPrice,
                'remark' => $people.' 人就餐|'.$leave,
                'paid_at' => date('Y-m-d H:i:s'),
                'payment_method' => $payment_method,
                'payment_no' => $payment_no,
                'refund_status' => 'pending',
                'closed' => 0,
                'reviewed' => 1,
                'ship_status' => 'pending',
                'extra' => '',
                // 设置其他订单默认字段
            ]);

            foreach ($cartBody as $key => $value) {
                $lowestPriceSku = ProductSku::where('product_id', $value['product_id'])
                    ->orderBy('price', 'asc')
                    ->first();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $value['product_id'],
                    'product_sku_id' => $lowestPriceSku->id,
                    'amount' => $value['quantity'],
                    'price' => $value['price'],
                ]);
            }
            $deleted = Cart::where('user_id', $userid)->delete();
            // 提交事务
            \DB::commit();

            return response()->json(['message' => 'Order created successfully'], 201);
        } catch (\Exception $e) {
            // 回滚事务
            \DB::rollback();
            return response()->json(['error' => 'Order creation failed', 'message' => $e->getMessage()], 500);
        }
        /*

FieldTypeComment
idbigint unsigned NOT NULL
order_idbigint unsigned NOT NULL
product_idbigint unsigned NOT NULL
product_sku_idbigint unsigned NOT NULL
amountint unsigned NOT NULL
pricedecimal(10,2) NOT NULL
ratingint unsigned NULL
reviewtext NULL
reviewed_attimestamp NULL
*/
    }

    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));
        $coupon  = null;

        // 如果用户提交了优惠码
        if ($code = $request->input('coupon_code')) {
            $coupon = CouponCode::where('code', $code)->first();
            if (!$coupon) {
                throw new CouponCodeUnavailableException('优惠券不存在');
            }
        }
        // 参数中加入 $coupon 变量
        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'), $coupon);
    }

    public function index(Request $request)
    {
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }

    public function received(Order $order, Request $request)
    {
        // 校验权限
        $this->authorize('own', $order);

        // 判断订单的发货状态是否为已发货
        if ($order->ship_status !== Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('发货状态不正确');
        }

        // 更新发货状态为已收到
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        // 返回订单信息
        return $order;
    }

    public function review(Order $order)
    {
        // 校验权限
        $this->authorize('own', $order);
        // 判断是否已经支付
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未支付，不可评价');
        }
        // 使用 load 方法加载关联数据，避免 N + 1 性能问题
        return view('orders.review', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }

    public function sendReview(Order $order, SendReviewRequest $request)
    {
        // 校验权限
        $this->authorize('own', $order);
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未支付，不可评价');
        }
        // 判断是否已经评价
        if ($order->reviewed) {
            throw new InvalidRequestException('该订单已评价，不可重复提交');
        }
        $reviews = $request->input('reviews');
        // 开启事务
        \DB::transaction(function () use ($reviews, $order) {
            // 遍历用户提交的数据
            foreach ($reviews as $review) {
                $orderItem = $order->items()->find($review['id']);
                // 保存评分和评价
                $orderItem->update([
                    'rating'      => $review['rating'],
                    'review'      => $review['review'],
                    'reviewed_at' => Carbon::now(),
                ]);
            }
            // 将订单标记为已评价
            $order->update(['reviewed' => true]);
        });
        event(new OrderReviewed($order));

        return redirect()->back();
    }

    public function applyRefund(Order $order, ApplyRefundRequest $request)
    {
        // 校验订单是否属于当前用户
        $this->authorize('own', $order);
        // 判断订单是否已付款
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未支付，不可退款');
        }
        // 判断订单退款状态是否正确
        if ($order->refund_status !== Order::REFUND_STATUS_PENDING) {
            throw new InvalidRequestException('该订单已经申请过退款，请勿重复申请');
        }
        // 将用户输入的退款理由放到订单的 extra 字段中
        $extra                  = $order->extra ?: [];
        $extra['refund_reason'] = $request->input('reason');
        // 将订单退款状态改为已申请退款
        $order->update([
            'refund_status' => Order::REFUND_STATUS_APPLIED,
            'extra'         => $extra,
        ]);

        return $order;
    }
}
