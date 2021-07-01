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

    public function fetchLikes(Request $request)
    {
        $post = Post::findOrFail($request->post);

        return response()->json([
            'post' => $post
        ]);
    }

    public function manageLike(Request $request)
    {
        $post = Post::findOrFail($request->post);

        $count = $post->like;
        $post->like = $count + 1;
        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'liked'
        ]);
    }


    public function storeComment(Request $request)
    {
        $comment = new Comment;

        $comment->content = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->whereNull('parent_id')->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->content = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }
}
