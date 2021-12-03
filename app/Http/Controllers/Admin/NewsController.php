<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\MessagesMeta;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use MongoDB\Driver\Session;

class NewsController extends Controller
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
        $news = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.news.index', compact('user', 'totalInbox', 'news'));
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
        $categories = Category::paginate(10);
        return view('admin.news.create', compact('user', 'totalInbox', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
            'title' => 'required|unique:news|max:160',
            'body' => 'required',
            'category_id' => 'required',
        ], $messages);

        $news = new News;
        $news->title = $request->title;
        if ($request->subTitle) {
            $news->subTitle = $request->subTitle;
        }
        $news->user_id = $user;
        $news->category_id = $request->category_id;
        $news->slug = str::slug($request->title);
        $news->body = $request->body;
        $news->status = $request->status;
        $news->save();

        if ($request->hasfile('images'))
            foreach ($request->file('images') as $image) {
                {
                    $media = new Media;
                    $input['image_name'] = uniqid() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/img/news');
                    $img = Image::make($image->path());
                    $img->resize(600, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['image_name']);
                    $media->file = $input['image_name'];
                    $media->user_id = $user;
                    $media->news_id = $news->id;
                    $media->save();
                }
            }


        return redirect(route('admin.news.index'))->with('status', 'you have publish news successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user)->whereNull('status')->whereNull('read_at')->get();
        $news = News::find($id);
        $media = Media::where('news_id', $id)->get();
        return view('admin.news.show', compact('user', 'totalInbox', 'news', 'media'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $media = Media::where('news_id', $id)->get();

        if ($media->count() > 0) {
            foreach ($media as $med) {
                $path = public_path() . "/img/news/" . $med->file;
                unlink($path);
            }
            Media::destroy($media);
        }
        News::destroy($id);

        session()->flash('danger', 'News deleted successfully!');
        return redirect(route('admin.news.index'));
    }
}
