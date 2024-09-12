<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Alert::alert('عملیات ناموفق', 'Message', 'error');

        $Category = $request -> validate([
            'title' => ['required'],
            'english_title' => ['required'],
        ]);
        
        $Brand = new Brand();
        $Brand->title = $request->title;
        $Brand->english_title = $request->english_title;
        $Brand->save();
        
        Alert::success('عملیات موفق', 'برند ثبت شد.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findorFail($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $brand = Brand::findOrFail($id);

        $request -> validate([
            'title' => ['required'],
            'english_title' => ['required'],
        ]);

        $brand->title = $request->title;
        $brand->english_title = $request->english_title;
        $brand->save();

        Alert::success('عملیات موفق', 'برند ویرایش شد.');

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
