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
        $categories = Category::all();
        $parentcategories = Category::whereNull('parent_id')->get();
        $title = 'حذف دسته!';
        $text = "آیا از حذف این دسته اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.category.index',compact('categories','parentcategories'));
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
        $category = Category::findOrFail($id);
        $parentcategories = Category::whereNull('parent_id')->get();
        return view('admin.category.edit',compact('category','parentcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $Category = Category::findOrFail($id);

        $request -> validate([
            'title' => ['required'],
            'english_title' => ['required'],
        ]);

        $Category->title = $request->title;
        $Category->english_title = $request->english_title;
        $Category->parent_id = $request->parent_id;
        $Category->save();

        Alert::success('عملیات موفق', 'دسته ویرایش شد.');

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('hi');
    }
}
