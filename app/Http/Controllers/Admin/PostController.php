<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Media;
use App\Models\MessagesMeta;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user)->whereNull('status')->whereNull('read_at')->get();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.posts.index', compact('user', 'totalInbox', 'posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user)->whereNull('status')->whereNull('read_at')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.posts.create', compact('user', 'totalInbox', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $messages = [
            "images.max" => "file can't be more than 12."
        ];
        $this->validate($request, [

            'images.*' => 'mimes:jpg,jpeg,bmp,png|max:5000',
            'images' => 'max:12',
            'title' => 'required|unique:posts|max:200',
            'body' => 'required',
            'category_id' => 'required',
        ], $messages);

        $post = new Post;
        $post->title = $request->title;
        $post->user_id = $user;
        $post->category_id = $request->category_id;
        $post->slug = str::slug($request->title);
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();

        if ($request->hasfile('images'))
            foreach ($request->file('images') as $image) {
                {
                    $media = new Media;
                    $input['image_name'] = uniqid() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/img/posts');
                    $img = Image::make($image->path());
                    $img->resize(600, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['image_name']);
                    $media->file = $input['image_name'];
                    $media->user_id = $user;
                    $media->post_id = $post->id;
                    $media->save();
                }
            }


        return redirect(route('admin.posts.index'))->with('status', 'you have publish news successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user)->whereNull('status')->whereNull('read_at')->get();
//        $post = Post::orderBy('created_at', 'DESC')->paginate(10);
        $media = Media::where('post_id', $post->id)->get();

        return view('admin.posts.show', compact('user', 'totalInbox', 'post', 'media'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        dd('Here is edit page for post controller');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        dd('Here is update function for post controller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = News::find($id);
        $media = Media::where('post_id', $id)->get();

        if ($media->count() > 0) {
            foreach ($media as $med) {
                $path = public_path() . "/img/posts/" . $med->file;
                unlink($path);
            }
            Media::destroy($media);
        }
        Post::destroy($id);

        session()->flash('danger', 'Blog post deleted successfully!');
        return redirect(route('admin.posts.index'));
    }
}
