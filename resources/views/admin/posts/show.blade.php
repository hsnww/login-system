@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.posts.index')}}" class="btn btn-secondary float-right">Back to posts list</a>
                <h1>Show blog post : {{$post->title}}</h1>
                @include('partials.alerts')
{{--                <h3>{{$news->title}}</h3>--}}
                @foreach($media as $record)
                    <a href="{{asset('img/posts')}}/{{ $record->file}}" target="_blank"><img src="{{asset('img/posts')}}/{{ $record->file}}" class="img img-thumbnail" width="200"/></a>

{{--                <img src="{{ $record->url}}" class="img img-thumbnail" width="200"/>--}}
                @endforeach
                <p>Category : {{$post->category->title	}}</p>
                <p>By : {{$post->user->name	}}</p>
                <p>On : {{$post->created_at	}}</p>
                <p>{{$post->body}}</p>

            </div>
        </div>
    </div>




@endsection
