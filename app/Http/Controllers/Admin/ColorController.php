<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        $title = 'حذف رنگ!';
        $text = "آیا از حذف این رم اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Alert::alert('عملیات ناموفق', 'Message', 'error');

        $Category = $request -> validate([
            'name' => ['required'],
            'code' => ['required'],
        ]);
        
        $Color = new Color();
        $Color->name = $request->name;
        $Color->code = $request->code;
        $Color->save();
        
        Alert::success('عملیات موفق', 'رنگ ثبت شد.');

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
        $color = Color::findOrFail($id);
        return view('admin.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Color = Color::findOrFail($id);

        $request -> validate([
            'name' => ['required'],
            'code' => ['required'],
        ]);

        $Color->name = $request->name;
        $Color->code = $request->code;
        $Color->save();

        Alert::success('عملیات موفق', 'رنگ ویرایش شد.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $color = Color::with('products')->findOrFail($id);

        if(count($color->products) == 0){
            $color = Color::findOrFail($id);
            $color->forceDelete();

            Alert::success('عملیات موفق','رنگ حذف شد.');
            return redirect()->back();

        }else
        {
            Alert::warning('اخطار','برای این رنگ محصول ثبت شده است.');
            return redirect()->back();
        }
    }
}
