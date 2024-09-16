<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerPhoto;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();

        return view('admin.banner.index',compact('banners'));
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
        if($request->hasFile('photo_banner','name')){
            $fileName = time().'_'.$request->photo_banner->getClientOriginalName();
            $filePath = $request->photo_banner->storeAs('banners',$fileName,'public');
            $suffix_photo = pathinfo($_FILES['photo_banner']['name'], PATHINFO_EXTENSION);
            $photo = new Photo();
            $photo->name = $fileName;
            $photo->src = 'storage/'.$filePath;
            $photo->suffix = $suffix_photo;
            $photo->save();

            $banner = Banner::find($request->banner_id);
            $photo->banner()->attach($banner);
        }
    }

    /**
     * Display the specified resource
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner_id = $id;
        $banner_photos = Banner::with('photos')->findOrFail($id);
        $title = 'حذف عکس!';
       $text = "آیا از حذف این عکس اطمینان دارید؟";
       confirmDelete($title, $text);
        return view('admin.banner.editPhoto',compact('banner_id','banner_photos'));
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
