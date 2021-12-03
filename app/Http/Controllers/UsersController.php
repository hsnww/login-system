<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\MessagesMeta;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $users = User::paginate(10);
        return view('user.profile', compact('users', 'totalInbox'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit($id)
    {

    }
    public function update(UserProfileRequest $request, $id)
    {
        $user = Auth()->user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $input['image_name'] = time().'.'.$image->extension();
            $destinationPath = public_path('/img/users');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['image_name']);
            if($user->avatar != 'default.jpg')
            {
                $filePath = "/img/users/".$user->avatar;
                if(file_exists(public_path($filePath))){
                    unlink(public_path($filePath));
                }
            }
            $user->avatar = $input['image_name'];
        }
        $user->save();
        return back();
    }
}
