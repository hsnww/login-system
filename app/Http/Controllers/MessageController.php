<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Models\Message;
use App\Models\MessagesMeta;
use App\Models\User;
use App\Notifications\NewMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
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
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();

            $messages = MessagesMeta::where('to', $user )->whereNull('status')->orderBy('created_at', 'desc')->paginate(15);
            return view('messaging.index', compact('messages', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
        }

    public function sent()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();
            $messages = MessagesMeta::where('user_id', $user )->orderBy('created_at', 'desc')->paginate(15);
            return view('messaging.sent', compact('messages', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
    }

    public function starredMessage(Message $message)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();

        $messages = MessagesMeta::where('to', $user )->where('flag','starred')->whereNull('status')->paginate(15);
        return view('messaging.starred', compact('messages', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
    }

    public function deleted(Message $message)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();

        $messages = MessagesMeta::where('to', $user )->where('status','deleted')->paginate(15);
        $countUsers = User::all();


        return view('messaging.deleted', compact('messages', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));

    }

    public function create()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->whereNull('status')->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();


        return view('messaging.create', compact('countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
    }

    public function store(SendEmailRequest $request)
    {

        $message = new Message;
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->save();

        $meta = new MessagesMeta;
        $to = User::where('email', $request->email)->first();
        $meta->create(['message_id'=>$message->id, 'user_id'=> Auth()->user()->id, 'to'=>$to->id]);

        $to->notify(new NewMessage($message));

        session()->flash('success', 'Your message has benn sent to '.$request->email.' Successfully ');
        return redirect()->route('user.messaging.index');


    }

    public function show($id)
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();
        $totalSent = MessagesMeta::where('user_id', $user )->whereNull('status')->get();
        $totalStarred = MessagesMeta::where('to', $user )->where('flag', 'starred')->whereNull('status')->get();
        $totalDeleted = MessagesMeta::where('to', $user )->where('status', 'deleted')->get();
        $countUsers = User::all();

        $message =MessagesMeta::where('message_id', $id)->where('to', $user)->first();
        if($message){
            $message->read_at = now();
            $message->save();
            return view('messaging.read', compact('message', 'countUsers', 'totalInbox','totalSent', 'totalStarred', 'totalDeleted'));
        }else{
            return redirect()->route('user.messaging.index');
        }
    }

    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }
}
