@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @include('partials.alerts')
        <div class="row">
            @include('partials.dashboard._emailSidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa fa-trash fa-2x ml-2"></i> Deleted messages</h4>
                        <p class="card-description">deleted messages you received from others </p>
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
                                <td>{{$message->user->name}}</td>
                                <td><a href="{{route('user.messaging.show', $message->id)}}">{{$message->message->subject}}</a></td>
                                <td>{{$message->created_at->diffForHumans()}}</td>
                                <td>
                                        <a href="{{route('user.unDeleteMessage', $message->id)}}" title="return message to inbox"> <i class="fa fa-reply-all"></i></a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
