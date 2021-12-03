<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\MessagesMeta;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
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


        if(Gate::allows('is-admin')){
            $users = User::paginate(10);
            return view('admin.users.index', compact('users', 'totalInbox'));
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
        $roles = Role::all();

        return view('admin.users.create', compact('totalInbox', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validated = $request->validate([
//            'name'=>'required|max:24',
//            'email'=>'required|max:148|unique:users',
//            'password'=>'required|min:6max:24'
//        ]);
//        $user = User::create($request->except(['_token', 'roles']));
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));
        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You have create new user');
        return redirect(route('admin.users.index'));
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
        $user = Auth::user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();

        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles', 'totalInbox'));
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
        $user = User::find($id);
        if(!$user)
        {
            $request->session()->flash('error', 'No User found');
            return redirect(route('admin.users.index'));
        }
        $validated = $request->validate([
            'name' => 'required|max:24',
            'email' => 'required|max:148|unique:users,email,'.$user->id,
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'You have update the user');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        $users = User::paginate(10);
        session()->flash('info', 'User Deleted successful!');
        return back()->with(['users'=> $users]);
    }
}
