@extends('layouts.dashboard')
@section('content')
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.news.create')}}" class="btn btn-secondary float-right">Add new</a>
                <h1>Media list</h1>

                @include('partials.alerts')
                <div class="row">
                    <ul class="list-group list-group-flush">

                    @foreach($media as $mediaRecord)
                            <li class="list-group-item">
                                <div class="col-sm-6  mb-5 mb-sm-2">
                                <img
                                    src="{{$mediaRecord->url}}"
                                    class="img-fluid"
                                    alt=""
                                />
                                </div>
                                <a href="" class="btn btn-xs btn-primary float-right mr-2">Edit</a>
                                <a href="" class="btn btn-xs btn-danger float-right mr-2">Delete</a>
                            </li>
                    @endforeach
                    </ul>
                </div>
                {{$media->links()}}
            </div>
        </div>
    </div>
@endsection
