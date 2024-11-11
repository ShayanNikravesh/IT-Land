<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memories = Memory::all();
        $title = 'حذف حافظه!';
        $text = "آیا از حذف این حافظه اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.memory.index',compact('memories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.memory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Alert::error('عملیات ناموفق');

        $memory = $request -> validate([
            'name' => ['required'],
            'size' => ['required'],
        ]);
        
        $memory = new Memory();
        $memory->name = $request->name;
        $memory->size = $request->size;
        $memory->save();
        
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
        $memory = Memory::findOrFail($id);
        return view('admin.memory.edit',compact('memory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Alert::error('عملیات ناموفق');

        $memory = Memory::findOrFail($id);

        $request -> validate([
            'name' => ['required'],
            'size' => ['required'],
        ]);

        $memory->name = $request->name;
        $memory->size = $request->size;
        $memory->save();

        Alert::success('عملیات موفق', 'حافظه ویرایش شد.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $memory = Memory::with('products')->findOrFail($id);

        if(count($memory->products) == 0){
            $memory = Memory::findOrFail($id);
            $memory->forceDelete();

            Alert::success('عملیات موفق','حافظه حذف شد.');
            return redirect()->back();

        }else
        {
            Alert::warning('اخطار','برای این حافظه محصول ثبت شده است.');
            return redirect()->back();
        }
    }
}
