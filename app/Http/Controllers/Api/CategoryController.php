<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::with(['products' => function ($query) {
            // 按照 is_recommended 字段降序排序，推荐的产品排在前面
            $query->orderByDesc('recommend');
        }])->get(); // 修改为 products
        $userid = $request->userid;

        $result = $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'image' => \Storage::disk('public')->url($category->icon), // 假设你想用icon作为category的image
                'foods' => $category->products->map(function ($product) { // 修改为 products

                    $cartItems = Cart::where('user_id', request('userid'))->where('product_id', $product->id)->first();
                    if (!empty($cartItems)) {
                        $quantity = $cartItems->quantity;
                    } else {
                        $quantity = 0;
                    }
                    return [
                        'id' => $product->id,
                        'icon' => \Storage::disk('public')->url($product->image),
                        'name' => $product->title,
                        'desc' => $product->description,
                        'price' => $product->price,
                        'recommend' => $product->recommend,
                        'value' => $quantity // 初始值
                    ];
                })
            ];
        });

        return response()->json($result);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
