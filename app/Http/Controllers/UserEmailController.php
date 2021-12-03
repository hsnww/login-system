<?php

namespace App\Http\Controllers;

use App\Models\MessagesMeta;
use App\Models\User;
use Illuminate\Http\Request;

class UserEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $countUsers = User::all();
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();

        return view('messaging.users', compact('users', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
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
    public function email($id)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();
        $emailTo = User::findOrFail($id);
        return view('messaging.create', compact('user','emailTo' , 'totalDeleted', 'countUsers', 'totalInbox' ,'totalSent' ,'totalStarred'));
    }
    public function starred($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->flag = 'starred';
        $email->update();
        return redirect()->route('user.messaging.index');

    }
    public function unStarred($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->flag = null;
        $email->update();
        return redirect()->route('user.messaging.index');

    }
    public function unRead($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->read_at = null;
        $email->update();
        return redirect()->route('user.messaging.index');

    }
    public function markRead($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->read_at = now();
        $email->update();
        return redirect()->route('user.messaging.index');

    }

    public function deleteMessage($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->status = 'deleted';
        $email->update();
        return redirect()->route('user.messaging.deleted');
    }

    public function unDeleteMessage($id)
    {
        $email = MessagesMeta::findOrFail($id);
        $email->status = null;
        $email->update();
        return redirect()->route('user.messaging.index');
    }

    public function notification()
    {
//        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();

//        Auth()->user()->unredNotifications->markAsRead();

        return view('notification.newMessage', [
            'notifications'=>auth()->user()->notifications,
            'totalInbox'=>MessagesMeta::where('to', auth()->user()->id )->whereNull('status')->whereNull('read_at')->paginate(5)
        ]);
    }

}
