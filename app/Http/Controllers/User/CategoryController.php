<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $itemsPerPage = 10;
        $category_products = Category::with(['products' => function($query) use ($itemsPerPage) {$query->where('status', '!=', 'inactive')->paginate($itemsPerPage);}])->findOrFail($id);
        $products = $category_products->products()->where('status', '!=', 'inactive')->with('colors')->with(['photos'=>function($query){$query->Limit(1);}])->paginate($itemsPerPage);
        return view('user.category.category-products',compact('category_products','products'));
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
}
