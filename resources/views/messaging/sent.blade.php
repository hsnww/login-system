@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @include('partials.alerts')
        <div class="row">
            @include('partials.dashboard._emailSidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-send fa-2x mr-2"></i>Sent Items</h4>
                        <p class="card-description"> messages you sent to others </p>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th scope="col">To</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                            <tr>

                                <td>{{$message->toUser->name}}</td>
                                <td>{{$message->message->subject}}</td>

                                <td>{{$message->created_at->diffForHumans()}}</td>
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
