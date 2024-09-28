<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoController extends Controller
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

        if($request->hasFile('product_photo','name')){
            $fileName = time().'_'.$request->product_photo->getClientOriginalName();
            $filePath = $request->product_photo->storeAs('products_photos',$fileName,'public');
            $suffix_photo = pathinfo($_FILES['product_photo']['name'], PATHINFO_EXTENSION);
            $photo = new Photo();
            $photo->name = $fileName;
            $photo->src = 'storage/'.$filePath;
            $photo->suffix = $suffix_photo;
            $photo->save();

            $sort = 1;
            $lastProductPhoto = ProductPhoto::where('product_id', $request->product_id)->latest()->first();

            if ($lastProductPhoto) {
                $sort = $lastProductPhoto['sort'] + 1;
            };

            $product = Product::find($request->product_id);
            $photo->product()->attach($product,['sort'=>$sort]);
            
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_id = $id;
        $product_photos = Product::with('photos')->findOrFail($id);
        $title = 'حذف عکس!';
        $text = "آیا از حذف این عکس اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.product.managePhoto',compact('product_id','product_photos'));
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
        $photo = Photo::findorFail($id);
        File::delete(public_path($photo->src));
        $photo->forceDelete();

        Alert::success('عملیات موفق','عکس حذف شد.');
        return redirect()->back();
    }
}
