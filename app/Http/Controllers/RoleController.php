<?php

namespace App\Http\Controllers;

use App\Models\MessagesMeta;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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

        $roles = Role::all();
      return view('admin.roles.index', compact('roles', 'totalInbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $validated = $request->validate([
            'name'=>'required|unique:roles|max:24',
        ]);
                ROle::create($request->only(['name']));
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
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
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
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
        $role = Role::find($id);
        $validated = $request->validate([
            'name' => 'required|max:24|unique:roles,name, '.$role->id,
        ]);
        $role->update($request->only(['name']));
        $request->session()->flash('success', 'You have update the role');
        return redirect(route('admin.roles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        $roles = Role::all();
        session()->flash('info', 'Role deleted successful!');
        return back();

    }
}
