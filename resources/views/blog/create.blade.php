@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="news-post-wrapper">
                <div class="news-post-wrapper-sm ">
                    <h1 class="text-center">
                        Creat new blog post
                    </h1>
                    <div class="text-center">
                        <a href="#" class="btn btn-dark font-weight-bold mb-4">News</a>
                    </div>
                </div>
                @include('partials.alerts')

                <form method="post" action="{{route('blog.store')}}">
                    @csrf
                    <div class="form-row">

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">title</label>
                        <input type="text" class="form-control" name="title" placeholder="Post title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select name="category_id" class="form-control font-weight-light">
                            <option>Choose...</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif'>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Body</label>
                        <textarea name="body" class="form-control">{{old('body')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send to publisher</button>
                </form>



            </div>
        </div>
    </div>
@endsection
