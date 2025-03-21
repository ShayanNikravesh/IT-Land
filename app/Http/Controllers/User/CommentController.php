<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('product')->where('user_id',Auth::guard('web')->user()->id)->get();
        return view('user.comment.index',compact('comments'));
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
        Alert::error('عملیات ناموفق');

        $request -> validate([
            'product_id' => ['required'],
            'comment' => ['required'],
        ]);

        $user_id = Auth::guard('web')->user()->id;

        $product = Product::findOrFail($request->product_id);
        if($product){
            $comment = new Comment();
            $comment->user_id = $user_id;
            $comment->product_id = $request->product_id;
            $comment->comment = $request->comment;
            $comment->save();

            Alert::success('عملیات موفق', 'نظر شما پس از تایید مدیریت ثبت خواهد شد.');
            return redirect()->back();
        }
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
