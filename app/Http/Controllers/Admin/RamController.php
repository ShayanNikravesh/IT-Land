<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rams = Ram::all();
        $title = 'حذف رم!';
        $text = "آیا از حذف این رم اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.ram.index',compact('rams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ram.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Alert::alert('عملیات ناموفق', 'Message', 'error');

        $ram = $request -> validate([
            'name' => ['required'],
            'size' => ['required'],
        ]);
        
        $ram = new Ram();
        $ram->name = $request->name;
        $ram->size = $request->size;
        $ram->save();
        
        Alert::success('عملیات موفق', 'حافظه ثبت شد.');

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
        $ram = Ram::findOrFail($id);
        return view('admin.ram.edit',compact('ram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ram = Ram::findOrFail($id);

        $request -> validate([
            'name' => ['required'],
            'size' => ['required'],
        ]);

        $ram->name = $request->name;
        $ram->size = $request->size;
        $ram->save();

        Alert::success('عملیات موفق', 'رم ویرایش شد.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ram = Ram::with('products')->findOrFail($id);

        if(count($ram->products) == 0){
            $ram = Ram::findOrFail($id);
            $ram->forceDelete();

            Alert::success('عملیات موفق','رم حذف شد.');
            return redirect()->back();

        }else
        {
            Alert::warning('اخطار','برای این رم محصول ثبت شده است.');
            return redirect()->back();
        }
    }
}
