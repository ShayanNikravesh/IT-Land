<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::with('user')->where('product_id',$id)->get();
        $title = 'حذف نظر!';
        $text = "آیا از حذف این نظر اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('admin.product.comments',compact('comments'));
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
        $comment = Comment::findOrFail($id);
        $comment->forceDelete();

        Alert::success('عملیات موفق','نظر حذف شد.');
        return redirect()->back();
    }

    public function ChangeStatus(string $id)
    {
        $comment = Comment::findOrFail($id);

        switch ($comment->status) {
            case 'active':
                $status = 'inactive';
                break;
            case 'inactive':
                $status = 'active';
                break;
            default:
                break;
        }

        $comment->status = $status;
        $comment->save();
    }
}
