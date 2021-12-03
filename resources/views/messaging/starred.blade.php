@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @include('partials.alerts')
        <div class="row">
            @include('partials.dashboard._emailSidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> <i class="fa fa-star fa-2x ml-2"></i> Starred messages</h4>
                        <p class="card-description"> starred messages you received from others </p>
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

                                    <a href="{{route('user.deleteMessage', $message->id)}}" title="Remove to deleted messages"> <i class="fa fa-trash"></i></a>
                                    <a href="{{route('user.unStarred', $message->id)}}" title="Cancel mark as starred message"><i class="fa fa-star mr-1"></i></a>
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
