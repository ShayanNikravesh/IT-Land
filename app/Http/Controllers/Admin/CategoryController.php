<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ParentCategory = Category::whereNull('parent_id')->get();
        return view('admin.category.create',compact('ParentCategory'));
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
        
        $Category = new Category();
        $Category->title = $request->title;
        $Category->english_title = $request->english_title;
        $Category->parent_id = $request->parent_id;
        $Category->save();
        
        Alert::success('عملیات موفق', 'دسته ثبت شد.');

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
