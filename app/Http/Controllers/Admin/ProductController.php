<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Memory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Ram;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('colors','category','brand','ram','memory')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        $brands = Brand::all();
        $memories = Memory::all();
        $rams = Ram::all();
        $colors = Color::all();
        return view('admin.product.create',compact('categories','brands','memories','rams','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Alert::error('عملیات ناموفق');

        $request->validate([
            'title' => ['required'],
            'english_title' => ['required'],
            'category'=>['required'],
            'brand'=>['required'],
            'description'=>['required'],
            'review'=>['required'],
            'status'=>['required'],
            'has_color'=>['required'],
        ]);        

        if($request->has_color == 1){
            
            Alert::error('عملیات ناموفق');

            $product = $request->validate([
                // 'title' => ['required'],
                // 'english_title' => ['required'],
                // 'category'=>['required'],
                // 'brand'=>['required'],
                // 'description'=>['required'],
                // 'review'=>['required'],
                // 'status'=>['required'],
                // 'has_color'=>['required'],
                'color.*'=>['required'],
                'color_stock.*'=>['required'],
                'color_price.*'=>['required'],
                'color_price_discounted.*'=>['required'],
            ]);

            // $tracking_code = strtoupper(bin2hex(random_bytes(10 / 2)));

            $product = new Product();
            $product->title = $request->title; 
            $product->english_title = $request->english_title;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand;
            $product->memory_id = $request->memory;
            $product->ram_id = $request->ram;
            $product->description = $request->description;
            $product->review = $request->review;
            $product->status = $request->status;
            $product->has_color = $request->has_color;
            $product->save();

            $product_id = $product->id;
            $colors = $request->color;
            $stocks = $request->color_stock;
            $prices = $request->color_price;
            $price_discounted = $request->color_price_discounted;

            foreach($colors as $key => $color){

                $ProductColor = new ProductColor();
                $ProductColor->product_id = $product_id;
                $ProductColor->color_id = $color;
                $ProductColor->stock = $stocks[$key];
                $ProductColor->price = $prices[$key];
                $ProductColor->price_discounted = $price_discounted[$key];
                $ProductColor->save();

            }

        }else{
            
            Alert::error('عملیات ناموفق');

            $product = $request->validate([
                // 'title' => ['required'],
                // 'english_title' => ['required'],
                // 'category'=>['required'],
                // 'brand'=>['required'],
                // 'description'=>['required'],
                // 'review'=>['required'],
                // 'status'=>['required'],
                // 'has_color'=>['required'],
                'stock'=>['required'],
                'price'=>['required'],
                'price_discounted'=>['required'],
            ]);

            $code = rand(111111111,999999999);
            $tracking_code = 'P-'.$code;
            
            $product = new Product();
            $product->title = $request->title; 
            $product->english_title = $request->english_title;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand;
            $product->tracking_code = $tracking_code;
            $product->memory_id = $request->memory;
            $product->ram_id = $request->ram;
            $product->description = $request->description;
            $product->review = $request->review;
            $product->status = $request->status;
            $product->has_color = $request->has_color;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->price_discounted = $request->price_discounted;
            $product->save();

        }

        Alert::success('عملیات موفق', 'محصول ثبت شد.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::with('colors','category','brand','ram','memory')->findorFail($id);
        return view('admin.product.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $colors = Color::all();
        $product = Product::with('colors','category','brand','ram','memory')->findorFail($id);
        return view('admin.product.edit',compact('product','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Alert::error('عملیات ناموفق');

        $product = Product::findOrFail($id);

        if($product->has_color == 1){

            // dd($request);

            $request->validate([
                'title' => ['required'],
                'english_title' => ['required'],
                'description'=>['required'],
                'review'=>['required'],
                'color.*'=>['required'],
                'color_stock.*'=>['required','numeric'],
                'color_price.*'=>['required','numeric'],
                'color_price_discounted.*'=>['required','numeric'],
            ]);

            $product->title = $request->title; 
            $product->english_title = $request->english_title;
            $product->description = $request->description;
            $product->review = $request->review;
            $product->save();

            $colors = $request->color; // ID رنگ‌ها
            $stocks = $request->color_stock; // موجودی هر رنگ
            $prices = $request->color_price; // قیمت هر رنگ
            $price_discounted = $request->color_price_discounted;

            $pivotData = [];
            foreach ($colors as $key => $colorId) {
                $pivotData[$colorId] = [
                    'stock' => $stocks[$key],
                    'price' => $prices[$key],
                    'price_discounted' => $price_discounted[$key],
                ];
            }

            $product->colors()->sync($pivotData);
            
            // dd($request);

            if ($request->has_new_color == 1) {

                $request->validate([
                    'new_color.*'=>['required'],
                    'new_color_stock.*'=>['required','numeric'],
                    'new_color_price.*'=>['required','numeric'],
                    'new_color_price_discounted.*'=>['required','numeric'],
                ]);
    
                $new_stocks = $request->new_color_stock;
                $new_prices = $request->new_color_price;
                $new_price_discounted = $request->new_color_price_discounted;
    
                foreach ($request->new_color as $newColorId) {
                    // اضافه کردن رنگ جدید با ویژگی‌های آن
                    $product->colors()->attach($newColorId, [
                        'stock' => $new_stocks[$key],
                        'price' => $new_prices[$key],
                        'price_discounted' => $new_price_discounted[$key],
                    ]);
                }
            }

        }else{
            $request->validate([
                'title' => ['required'],
                'english_title' => ['required'],
                'description'=>['required'],
                'review'=>['required'],
                'price'=>['required','numeric'],
                'price_discounted'=>['required','numeric'],
                'stock'=>['required','numeric'],
            ]);

            $product->title = $request->title; 
            $product->english_title = $request->english_title;
            $product->description = $request->description;
            $product->review = $request->review;
            $product->price = $request->price;
            $product->price_discounted = $request->price_discounted;
            $product->stock = $request->stock;
            $product->save();

        }

        Alert::success('عملیات موفق', 'محصول ویرایش شد.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request,string $id, string $Status)
    {
        $product = Product::findOrFail($id);
        $product->status = $Status;
        $product->save();

        Alert::success('عملیات موفق', 'وضعیت محصول تغییر کرد.');

        return redirect()->back();
    }

}
