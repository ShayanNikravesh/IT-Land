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
        // dd('hi');
        $products = Product::with(['photos'=>function($query){$query->Limit(1);}])->
        where(function ($q){
            $q->where('price_discounted','>',0)
              ->orWhereHas('colors', function ($q){
                  $q->where('price_discounted','>',0);
              });
        })
        ->paginate(10);
        // $products = Product::where('price_discounted','>',0)->with(['photos'=>function($query){$query->Limit(1);}])->paginate(10);
        return view('user.product.discounted-products',compact('products'));
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

    public function search(Request $request)
    {
        $search = $request->search;
        
        $Products = Product::where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->orWhere('english_title', 'LIKE', "%{$search}%")->get();

        $products = Product::with(['colors','category','brand','ram','memory'])->with(['photos'=>function($query){$query->Limit(1);}])->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->orWhere('english_title', 'LIKE', "%{$search}%")->paginate(10);

        if ($request->ajax()) {
            return response()->json($Products);
        }
    
        return view('user.product.search-products', compact('products'));
    }

    public function filter(Request $request)
    {

        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
    
        if ($request->has('brand')) {
            $query->where('brand_id', $request->brand);
        }
       
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where(function ($q) use ($request) {
                $q->where('price', '>=', $request->min_price)
                  ->orWhereHas('colors', function ($q) use ($request) {
                      $q->where('price', '>=', $request->min_price);
                  });
            });
        }
    
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where(function ($q) use ($request) {
                $q->where('price', '<=', $request->max_price)
                  ->orWhereHas('colors', function ($q) use ($request) {
                      $q->where('price', '<=', $request->max_price);
                  });
            });
        }

        if ($request->available == 1) {
            // $query->where('stock', '>', 0); // فرض می‌کنیم که فیلد stock تعداد موجودی کالا را نشان می‌دهد
            $query->where(function ($q) use ($request) {
                $q->where('stock', '>',0)
                  ->orWhereHas('colors', function ($q) use ($request) {
                      $q->where('stock', '>', 0);
                  });
            });
        }

        $products = $query->with(['photos'=>function($query){$query->Limit(1);}])->paginate(10)->appends($request->except('page'));

        return view('user.product.filter-products', compact('products'));
    }

}
