@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.posts.create')}}" class="btn btn-secondary float-right">Add new</a>
                <h1>Blog posts</h1>
                @include('partials.alerts')
                <ul class="list-group list-group-flush">

                    @foreach($posts as $post)
                    <li class="list-group-item">{{$post->title}}
                        <br>
                        <i>{{ $post->created_at }}</i>
                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-sm btn-secondary float-right ml-1">Show</a>
                        <span class="btn btn-sm btn-primary float-right ml-1">Edit</span>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="post" class="form-inline  float-right">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </li>

                    @endforeach

                </ul>
                {{$posts->links()}}
            </div>
        </div>
    </div>




@endsection
