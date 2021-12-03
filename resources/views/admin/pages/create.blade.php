@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.pages.index')}}" class="btn btn-secondary float-right">Back to pages list</a>
                <h1>Create new page</h1>
                @include('partials.alerts')
                <form  enctype="multipart/form-data" method="post" action="{{route('admin.pages.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="News title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="subTitle">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Add subtitle" value="{{old('description')}}">
                    </div>

                    <div class="form-group">
                        <label for="body">Page body</label>
                        <textarea class="form-control" name="body">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
