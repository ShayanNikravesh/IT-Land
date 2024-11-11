<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $title = 'حذف مقاله!';
        $text = "آیا از حذف این مقاله اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Alert::error('عملیات ناموفق');

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'title' => ['required'],
            'english_title' => ['required'],
            'article' => ['required'],
        ]);

        $article = new Article();
        $article->first_name = $request->first_name;
        $article->last_name = $request->last_name;
        $article->title = $request->title;
        $article->english_title = $request->english_title;
        $article->article = $request->article;
        $article->save();

        Alert::success('عملیات موفق', 'مقاله ثبت شد.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */

    //show article photo
    public function show(string $id)
    {
        $article_id = $id;
        $article_photos = Article::with('photos')->findOrFail($id);
        $title = 'حذف عکس!';
        $text = "آیا از حذف این عکس اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.article.managePhoto',compact('article_id','article_photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $title = 'حذف عکس!';
        $text = "آیا از حذف این عکس اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Alert::error('عملیات ناموفق');

        $article = Article::findOrFail($id);

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'title' => ['required'],
            'english_title' => ['required'],
            'article' => ['required'],
        ]);

        $article->first_name = $request->first_name;
        $article->last_name = $request->last_name;
        $article->title = $request->title;
        $article->english_title = $request->english_title;
        $article->article = $request->article;
        $article->save();

        Alert::success('عملیات موفق', 'مقاله ویرایش شد.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        $article_photos = Article::with('photos')->findOrFail($id);

        if($article_photos){
            foreach($article_photos->photos as $photo){
                $photo = Photo::findorFail($photo->id);
                File::delete(public_path($photo->src));
                $photo->forceDelete();
            }    
        }

        $article = Article::findOrFail($id);
        $article->forceDelete();

        Alert::success('عملیات موفق', 'مقاله حذف شد.');
        return redirect()->route('article.index');

    }

    public function storePhoto(Request $request)
    {

        if($request->hasFile('article_photo','name')){

            $article = Article::find($request->article_id);
            $existing_photo = $article->photos()->first();
            if($existing_photo){
                File::delete(public_path($existing_photo->src));
                $existing_photo->forceDelete();
            }

            $fileName = time().'_'.$request->article_photo->getClientOriginalName();
            $filePath = $request->article_photo->storeAs('articles_photos',$fileName,'public');
            $suffix_photo = pathinfo($_FILES['article_photo']['name'], PATHINFO_EXTENSION);
            $photo = new Photo();
            $photo->name = $fileName;
            $photo->src = 'storage/'.$filePath;
            $photo->suffix = $suffix_photo;
            $photo->save();

            
            $photo->article()->attach($article);
        }
    }

    public function ChangeStatus(string $id)
    {
        $article = Article::findOrFail($id);

        switch ($article->status) {
            case 'active':
                $status = 'inactive';
                break;
            case 'inactive':
                $status = 'active';
                break;
            default:
                break;
        }

        $article->status = $status;
        $article->save();
        
    }

}
