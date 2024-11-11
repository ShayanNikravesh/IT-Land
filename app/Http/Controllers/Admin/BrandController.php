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
        $title = 'حذف برند!';
        $text = "آیا از حذف این برند اطمینان دارید؟";
        confirmDelete($title, $text);
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

        Alert::error('عملیات ناموفق');

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
        
        Alert::error('عملیات ناموفق');

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
        $brand = Brand::with('products')->findOrFail($id);

        if(count($brand->products) == 0){
            $brand = Brand::findOrFail($id);
            $brand->forceDelete();

            Alert::success('عملیات موفق','برند حذف شد.');
            return redirect()->back();

        }else
        {
            Alert::warning('اخطار','برای این برند محصول ثبت شده است.');
            return redirect()->back();
        }

    }

    public function ChangeStatus(string $id)
    {
        $brand = Brand::findOrFail($id);

        switch ($brand->status) {
            case 'active':
                $status = 'inactive';
                break;
            case 'inactive':
                $status = 'active';
                break;
            default:
                break;
        }

        $brand->status = $status;
        $brand->save();
        
    }

}
