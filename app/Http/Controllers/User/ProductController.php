<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('colors','category','brand','ram','memory')->findorFail($id);
        return view('user.product.single-product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPriceByColor(Request $request)
    {
        $color_id = $request->input('color_id');
        $product_id = $request->input('product_id');

        // فرض کنید که محصول با ID مشخص شده را پیدا می‌کنید
        $product = Product::findorFail($product_id);

        // قیمت رنگ مورد نظر را برمی‌گردانید
        if ($product) {
            $color = $product->colors()->where('color_id', $color_id)->first();
            if($color){
                $color_name = $color->name;
                $price = $color->pivot->price;
                $price_discounted = $color->pivot->price_discounted;
                return response()->json(['price' => $price,'price_discounted' => $price_discounted,'color_name'=> $color_name]);
            }
        }
    }

}
