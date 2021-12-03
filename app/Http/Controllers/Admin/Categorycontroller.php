<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\MessagesMeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use MongoDB\Driver\Session;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();

        $categories = Category::all();

        if(Gate::allows('is-admin')){
            $users = User::paginate(10);
            return view('admin.categories.index', compact('categories','users', 'totalInbox'));
        }
        dd('You need to be admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();

        $roots = Category::where('root',0)->get();
        if(Gate::allows('is-admin')){
            $users = User::paginate(10);
            return view('admin.categories.create', compact('users', 'totalInbox' , 'roots'));
        }
        dd('You need to be admin');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $image = $request->file('imgFile');
        $input['imagename'] = time().'.'.$image->extension();

        $filePath = public_path('/img/categories/thumbnails');

        $img = Image::make($image->path());
        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);

        $filePath = public_path('/img/categories');
        $img->resize(600, 400, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);
//        $image->move($filePath, $input['imagename']);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        if(isset($request->root)){
            $category->root = $request->root;
        }
        $category->description = $request->description;
        $category->save();
        $image = new Media;
        $image->file = $input['imagename'];
        $image->content_id = $category->id;
        $image->content_type = 'Category';
        $image->save();

        $request->session()->flash('status', 'Your category saved successfully');
        return redirect()->route('admin.category.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        session()->flash('status', 'Category deleted successfully');
        return redirect()->route('admin.category.index');
    }
}
