<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\Post\storePostRequest;
use App\Http\Requests\Post\updatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(5);


        return view('dashboard.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Filesystem $filesystem
     * @return void
     */
    public function store(storePostRequest $request, Filesystem $filesystem)
    {
        $categoryId = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();
        // $banner = $this->uploadBanner($request, $filesystem);
        $file = $request->banner;
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $day = Carbon::now()->format('d');

        $date = "upload/post/{$day}.{$month}.{$year}";

        $fileName = $file->getClientOriginalName();
        if ($filesystem->exists(public_path("{$date}/{$fileName}"))) {
            $fileName = Carbon::now()->getTimestamp() . "-{$fileName}";
        }
        $file->move(public_path($date), $fileName);

        $data = $request->validated();
        $data['banner'] = $fileName;
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;
        $post = Post::create($data);

        $post->categories()->sync($categoryId);

        event(new PostCreated($post));

        return redirect()->route('post.index')->with('success-message', 'post submit is successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, Post $post, Filesystem $filesystem)
    {
        $categoryId = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();
        // $banner = $this->uploadBanner($request, $filesystem);
        $data = $request->validated();
        if ($request->hasFile('banner')) {
            $file = $request->banner;
            $year = Carbon::now()->format('Y');
            $month = Carbon::now()->format('m');
            $day = Carbon::now()->format('d');

            $date = "upload/post/{$day}.{$month}.{$year}";

            $fileName = $file->getClientOriginalName();
            if ($filesystem->exists(public_path("{$date}/{$fileName}"))) {
                $fileName = Carbon::now()->getTimestamp() . "-{$fileName}";
            }
            $file->move(public_path($date), $fileName);
            $data['banner'] = $fileName;
        }
        $post->update($data);

        $post->categories()->sync($categoryId);

        return redirect()->route('post.index')->with('success-message', 'post updated is successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success-message', 'the post delete is successfully');
    }

    public function uploadCheckEditor(storePostRequest $request)
    {
        $file = $request->file('upload');
        // logo.png
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo

        $ext = $file->getClientOriginalExtension(); // png

        $file_name = $base_name . '_' . time() . '.' . $ext;

        $file->storeAs('images/posts', $file_name, 'public_files');

        $function = $request->CKEditorFuncNum;
        $url = asset('images/posts/' . $file_name);

        return response("<script>window.parent.CKEDITOR.tools.callFunction({$function}, '{$url}', 'فایل به درستی اپلود شد')</script>");
    }

    public function uploadBanner(storePostRequest $request, Filesystem $filesystem)
    {
        $file = $request->banner;
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $day = Carbon::now()->format('d');

        $date = "{$day}.{$month}.{$year}";

        $fileName = $file->getClientOriginalName();
        if ($filesystem->exists(public_path("{$date}/{$fileName}"))) {
            $fileName = Carbon::now()->getTimestamp() . "-{$fileName}";
        }
        $file->move(public_path($date), $fileName);
    }
}
