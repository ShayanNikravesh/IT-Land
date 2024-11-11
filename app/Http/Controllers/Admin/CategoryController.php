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

        Alert::error('عملیات ناموفق');

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

        Alert::error('عملیات ناموفق');

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

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $child = Category::where('parent_id',$id)->get();
        $category = Category::with('products')->findOrFail($id);

        if(count($child) == 0)
        {
            if(count($category->products) == 0){
                $category = Category::findOrFail($id);
                $category->forceDelete();

                Alert::success('عملیات موفق','دسته حذف شد.');
                return redirect()->back();

            }else
            {
                Alert::warning('اخطار','در این دسته محصول ثبت شده است.');
                return redirect()->back();
            }
        }

        Alert::warning('اخطار','دسته دارای زیرمجموعه است.');
        return redirect()->back();
    }

    public function ChangeStatus(string $id)
    {
        $category = Category::findOrFail($id);

        switch ($category->status) {
            case 'active':
                $status = 'inactive';
                break;
            case 'inactive':
                $status = 'active';
                break;
            default:
                break;
        }

        $category->status = $status;
        $category->save();
    }

}
