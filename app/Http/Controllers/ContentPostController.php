<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\AddCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class ContentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Comment $comment)
    {
        $post->load(['comments']);
        $comment->load(['replies']);

        return view('weblog.post-content', compact('post', 'comment'));
    }

    public function store(AddCommentRequest $request)
    {
        $data = $request->validated();

        Comment::create($data);

        return 'ok';
    }
}