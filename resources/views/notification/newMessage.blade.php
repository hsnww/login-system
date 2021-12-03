@extends('layouts.dashboard')
@section('content')
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card">
    <div class="card-body">
        <h4 class="card-title">Notifications</h4>
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item">

                    a new message  <strong>{{$notification->data['message']['subject']}}</strong> sent to you on {{$notification->data['message']['created_at']}}
                    <br>
                    <a href="{{route('user.messaging.show', $notification->data['message']['id'])}}"class="btn btn-secondary float-right">view mail box</a>
                </li>

            @endforeach
        </ul>
    </div>
        </div>
    </div>
@endsection
