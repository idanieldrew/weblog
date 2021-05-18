<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['post', 'user'])->withCount('replies')->paginate();

        return view('dashboard.comment.index', compact('comments'));
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comment.index')->with('success-message', 'successfully delete');
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'featured' => ! $comment->featured
            ]
        );
        return redirect()->route('comment.index')->with('success-message', 'update successfully');
    }
}
