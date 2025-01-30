<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Photo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::all();
        $title = 'حذف خبر!';
        $text = "آیا از حذف این خبر اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.info.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info.create');
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
            'text' => ['required'],
        ]);

        $info = new Info();
        $info->title = $request->title;
        $info->english_title = $request->english_title;
        $info->text = $request->text;
        $info->save();

        Alert::success('عملیات موفق', 'خبر ثبت شد.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $info = Info::with('photos')->findOrFail($id);
        $title = 'حذف عکس!';
        $text = "آیا از حذف این عکس اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.info.managePhoto',compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Info::findOrFail($id);
        return view('admin.info.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Alert::error('عملیات ناموفق');

        $info = Info::findOrFail($id);

        $request->validate([
            'title' => ['required'],
            'english_title' => ['required'],
            'text' => ['required'],
        ]);

        $info->title = $request->title;
        $info->english_title = $request->english_title;
        $info->text = $request->text;
        $info->save();

        Alert::success('عملیات موفق', 'خبر ویرایش شد.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $info = Info::with('photos')->findOrFail($id);
        
        if($info){
            foreach($info->photos as $photo){
                $photo = Photo::findorFail($photo->id);
                File::delete(public_path($photo->src));
                $photo->forceDelete();
            }    
        }

        $info->forceDelete();

        Alert::success('عملیات موفق', 'خبر حذف شد.');
        return redirect()->route('info.index');
    }

    public function storephoto(Request $request)
    {

        if($request->hasFile('info_photo','name')){

            $info = Info::find($request->info_id);
            $existing_photo = $info->photos()->first();
            if($existing_photo){
                File::delete(public_path($existing_photo->src));
                $existing_photo->forceDelete();
            }

            $fileName = time().'_'.$request->info_photo->getClientOriginalName();
            $filePath = $request->info_photo->storeAs('infos_photos',$fileName,'public');
            $suffix_photo = pathinfo($_FILES['info_photo']['name'], PATHINFO_EXTENSION);
            $photo = new Photo();
            $photo->name = $fileName;
            $photo->src = 'storage/'.$filePath;
            $photo->suffix = $suffix_photo;
            $photo->save();

            
            $photo->info()->attach($info);
        }
    }
}
