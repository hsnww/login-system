@extends('layouts.dashboard')

@section('content')


    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.news.index')}}" class="btn btn-secondary float-right">Back to news list</a>
                <h1>Create news</h1>
                @include('partials.alerts')
                <form  enctype="multipart/form-data" method="post" action="{{route('admin.news.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="News title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="subTitle">Sub title</label>
                        <input type="text" class="form-control" name="subTitle" placeholder="Add subtitle" value="{{old('subTitle')}}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <option>Select</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body">News body</label>
                        <textarea class="form-control" name="body">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Images</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Publishing</legend>
                            <div class="col-sm-10">
                                <div>
                                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Publish
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        Save to publish later
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
