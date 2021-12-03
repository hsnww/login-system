@extends('layouts.dashboard')

@section('content')

    <div class="content-wrapper">
        @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                <p>{{ Session::get('status') }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <a href="{{route('admin.category.create')}}" class="btn btn-info float-right">Create new</a>

                        <table class="table table-sm">
                            <thead>

                            <tr>
                                <th>Title</th>
                                <th>Root</th>
                                <th>Image.</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach( $categories as $category )
                            <tr>
                                <td>{{$category->title}}</td>
                                <td>{{$category->category_id}}</td>
                                <td>12 May 2017</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <form class="form-inline float-right" method="post" action="{{ route('admin.category.destroy', $category->id )}}">
                                        @csrf
                                        {{method_field('Delete')}}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
