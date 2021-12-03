@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            @include('partials.dashboard._emailSidebar')
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input size</h4>
                        <p class="card-description"> This is the default bootstrap form layout </p>
                    </div>
                    <div class="card-body">
                        @include('partials.alerts')
                        <form method="POST" action="{{route('user.messaging.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">To</label>
                                <input type="text" class="form-control" name="email" placeholder="send to email" @if(isset($emailTo)) value="{{$emailTo->email}}" @else value="{{old('email')}}" @endif>
                                <small id="emailHelp" class="form-text text-muted">it should be in our user's database.</small>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="your email subject"  value="{{old('subject')}}">
                            </div>
                            <div class="form-group">
                                <label for="body">Message</label>
                                <textarea name="body" class="form-control" rows="10">{{old('body')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
