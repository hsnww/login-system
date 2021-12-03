@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @include('partials.alerts')
        <div class="row">
            @include('partials.dashboard._emailSidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"><i class="fa fa-envelope fa-2x mr-2"></i>Inbox messages</h4>
                        <p class="card-description"> messages you received from others </p>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">From</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)

                            <tr  @if($message->read_at == null) class="font-weight-bolder" @else class="bg-light" @endif >
                                <th scope="row">{{$message->id}}</th>
                                <td>{{$message->user? $message->user->name : ''}}</td>
                                <td><a href="{{route('user.messaging.show', $message->id)}}">{!! substr($message->message->subject, 0,25) !!} ...</a></td>
                                <td>{{$message->created_at->diffForHumans()}}</td>
                                <td>
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
                                        <a href="{{route('user.unDeleteMessage', $message->id)}}" title="remove to inbox"> <i class="fa fa-trash-o"></i></a>
                                            @endif
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{$messages->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
