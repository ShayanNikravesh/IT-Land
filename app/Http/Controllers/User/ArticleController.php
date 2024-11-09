<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function blogs()
    {
        $articles = Article::with('photos')->where('status','active')->get();
        return view('user.blog.blogs',compact('articles'));
    }

    public function blog(string $id)
    {
        $article = Article::where('status','active')->where('id',$id)->firstOrFail();
        $articles = Article::with('photos')->where('status','active')->get();
        return view('user.blog.blog',compact('article','articles'));
    }
}
