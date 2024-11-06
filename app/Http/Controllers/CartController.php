<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // 添加商品到购物车
    public function addToCart(Request $request)
    {

        if ($request->quantity == 0) {
            $cartItem = Cart::where('user_id', $request->userid)
                ->where('product_id', $request->product_id)
                ->first();
            $cartItem->delete();
        } else {
            $cartItem = Cart::updateOrCreate(
                [
                    'user_id' => $request->userid,
                    'product_id' => $request->product_id,
                ],
                [
                    'quantity' => $request->quantity,
                ]
            );
        }

        return response()->json($cartItem, 201);
    }

    // 获取用户购物车
    public function getCart(Request $request)
    {
        $cartItems = Cart::where('user_id', $request->userid)->with('product')->get();
        $cartBody = [];
        $totalPrice = 0;
        $total = 0;
        foreach ($cartItems as $key => $value) {
            $cartBody['item'][] = [
                'icon' => \Storage::disk('public')->url($value->product->image),
                'name' => $value->product->title,
                'price' => $value->product->price,
                'desc' => $value->product->description,
                'product_id' => $value->product->id,
                'quantity' => $value->quantity,
            ];
            $totalPrice = bcadd($totalPrice, bcmul($value->quantity, $value->product->price));
            $total = bcadd($total, $value->quantity);
        }
        if (!empty($cartBody)) {
            $cartBody['price'] = $totalPrice;
            $cartBody['total'] = $total;
        }
        return response()->json($cartBody, 200);
    }

    // 删除购物车中的商品
    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return response()->json(['message' => 'Item removed successfully']);
    }
}
