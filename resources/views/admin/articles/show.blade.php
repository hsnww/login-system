@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.articles.index')}}" class="btn btn-secondary float-right">Back to pages list</a>
                <h1>Show Article : {{$article->title}}</h1>
                <h3>By: {{$article->author_name}}</h3>
                @include('partials.alerts')

                @foreach($media as $record)
                <img src="{{ $record->url}}" class="img img-fluid" width="600"/>
                @endforeach
                <p>{{$article->description}}</p>
                <p>{{$article->body}}</p>

            </div>
        </div>
    </div>




@endsection
