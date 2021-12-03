@extends('layouts.dashboard')

@section('content')

        <div class="content-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create category</h4>

                            <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('admin.category.store')}}">
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Category Title" value="{{old('title')}}">
                                    <p><small>Equal or less than 160 Characters</small></p>
                                </div>
                                <div class="form-group">
                                    <label for="root">Root</label>
                                    <select name="root" class="form-control">
                                        <option value="0">Select</option>
                                        @foreach($roots as $root)
                                        <option value="{{$root->id}}">{{$root->title}}</option>
                                        @endforeach
                                    </select>
                                    <small>Leave it blank if you want to create root category</small>
                                </div>
                           <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Category Description" value="{{old('description')}}">
                               <p><small>Give a description not more than 500 Characters</small></p>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="imgFile" class="file-upload-info"  placeholder="Upload Image">

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
