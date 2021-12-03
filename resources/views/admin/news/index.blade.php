@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.news.create')}}" class="btn btn-secondary float-right">Add new</a>
                <h1>News list</h1>
                @include('partials.alerts')
                <ul class="list-group list-group-flush">

                    @foreach($news as $newsRecord)
                    <li class="list-group-item">{{$newsRecord->title}}
                        <br>
                        <i>{{ $newsRecord->created_at }}</i>
                        <a href="{{route('admin.news.show', $newsRecord->id)}}" class="btn btn-sm btn-secondary float-right ml-1">View</a>
                        <span class="btn btn-sm btn-primary float-right ml-1">Edit</span>
                        <form action="{{route('admin.news.destroy', $newsRecord->id)}}" method="post" class="form-inline  float-right">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </li>

                    @endforeach

                </ul>
                {{$news->links()}}
            </div>
        </div>
    </div>




@endsection
