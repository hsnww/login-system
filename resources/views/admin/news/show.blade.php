@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.news.index')}}" class="btn btn-secondary float-right">Back to pages list</a>
                <h1>Show news : {{$news->title}}</h1>
                @include('partials.alerts')
{{--                <h3>{{$news->title}}</h3>--}}
                @foreach($media as $record)
                <img src="{{asset('img/news')}}/{{ $record->file}}" class="img img-thumbnail" width="200"/>
                @endforeach
                <p>{{$news->subTitle}}</p>
                <p>{{$news->body}}</p>

            </div>
        </div>
    </div>




@endsection
