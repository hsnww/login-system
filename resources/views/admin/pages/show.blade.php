@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.pages.index')}}" class="btn btn-secondary float-right">Back to pages list</a>
                <h1>Show page</h1>
                @include('partials.alerts')
                <h3>{{$page->title}}</h3>
                @foreach($media as $record)
                <img src="{{ $record->url}}" width="100%" />
                @endforeach
                <p>{{$page->description}}</p>
                <p>{{$page->body}}</p>

            </div>
        </div>
    </div>




@endsection
