@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            @include('partials.dashboard._emailSidebar')
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if($message)
                        <h4 class="card-title"> Subject: {{ $message->message->subject }}</h4>

                            @if($message->flag == null)
                                <a href="{{route('user.starred', $message->id)}}" title="Mark as starred message"><i class="fa fa-star-o mr-1"></i></a>
                            @elseif($message->flag != null)
                                <a href="{{route('user.unStarred', $message->id)}}" title="Cancel mark as starred message"><i class="fa fa-star mr-1"></i></a>
                            @endif
                            @if($message->read_at == null)
                                <a href="{{route('user.markRead', $message->id)}}" title="Mark as read message"><i class="fa fa-send-o mr-2"></i></a>
                            @elseif($message->read_at != null)
                                <a href="{{route('user.unRead', $message->id)}}" title="Mark as Un read message"><i class="fa fa-send mr-2"></i></a>
                            @endif
                            @if($message->status == null)
                                <a href="{{route('user.deleteMessage', $message->id)}}" title="Remove to deleted messages"> <i class="fa fa-trash"></i></a>
                            @elseif($message->status != null)
                                <a href="{{route('user.unDeleteMessage', $message->id)}}" title="return message to inbox"> <i class="fa fa-reply-all"></i></a>
                            @endif

                        <p class="card-description"> From:  {{ $message->message->meta->user->name }} </p>
                        <p class="card-description"> On: {{ $message->created_at }} </p>
                        <p class="card-description"> Message: {{ $message->message->body }} </p>
                    </div>

                    <p>
                        <a class="btn btn-primary ml-5" data-toggle="collapse" href="#addReply" role="button" aria-expanded="false" aria-controls="addReply">
                            <i class="fa fa-send"></i>
                            Reply
                        </a>

                    </p>
                    <div class="collapse" id="addReply">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form method="POST" action="{{route('user.messaging.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="subject">To</label>
                                    <input type="email" class="form-control" name="email" placeholder="your email subject"  value="{{ $message->user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="your email subject"  value="Re: {{ $message->message->subject }}">
                                </div>
                                <div class="form-group">
                                    <label for="body">Message</label>
                                    <textarea name="body" class="form-control" rows="10">

                                        In {{$message->created_at}} By: {{$message->user->name}}

                                        {!! nl2br($message->message->body) !!}
                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                            @else
                                <p class="alert-danger m-5 p-5">There is no message to read</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
