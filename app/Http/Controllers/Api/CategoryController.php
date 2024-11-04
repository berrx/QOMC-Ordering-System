<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('products')->get(); // 修改为 products

        $result = $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'image' => \Storage::disk('public')->url($category->icon), // 假设你想用icon作为category的image
                'foods' => $category->products->map(function ($product) { // 修改为 products
                    return [
                        'id' => $product->id,
                        'icon' => \Storage::disk('public')->url($product->image),
                        'name' => $product->title,
                        'desc' => $product->description,
                        'price' => $product->price,
                        'value' => 0 // 初始值
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
