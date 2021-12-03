@extends('layouts.default')
@section('banner')

    @endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="owl-carousel owl-theme" id="main-banner-carousel">

                @if($sliderPosts->count() > 0)
                @foreach($sliderPosts as $sliderPost)
                <div class="item">
                    <div class="carousel-content-wrapper mb-2">
                        <div class="carousel-content">
                            <h1 class="font-weight-bold">
                                {{$sliderPost->news? $sliderPost->news->title: ''}}
                            </h1>
                            <h5 class="font-weight-normal  m-0">
                                Lorem Ipsum has been the industry's standard
                            </h5>
                            <p class="text-color m-0 pt-2 d-flex align-items-center">
                                <span class="fs-10 mr-1">{{$sliderPost->news? $sliderPost->news->created_at->diffForHumans() : ''}}</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                        <div class="carousel-image">
                            <img src="{{$sliderPost->url}}" alt="" />
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
        <div class="col-lg-4">
             <h4 class="mt-3">Writers & Articles</h4>
            <div class="row">
                @if($users->count() > 0)
                @foreach($users as $user)
                <div class="col-sm-6">
                    <div class="py-3 border-bottom">
                        <div class="d-flex align-items-center pb-2">
                            <img
                                src="{{ $user->url }}"
                                class="img-rounded mr-2"
                                alt="{{$user->user->name}}"
                                width="48"
                            />
                            <span class="fs-12 text-muted">{{$user->user->name}}</span>
                        </div>
                        <p class="fs-14 m-0 font-weight-medium line-height-sm">
                            <a href="">{{$user->user->article? $user->user->article->title : ''}}</a>
                        </p>
                    </div>
                </div>
                @endforeach
                    @endif
            </div>

        </div>
    </div>
    <div class="world-news">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex position-relative  float-left">
                    <h3 class="section-title">World News</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @if($worldNewsPosts->count() > 0)
            @foreach($worldNewsPosts as $worldNewsPost)
            <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                    <img
                        src="{{$worldNewsPost->url}}"
                        class="img-fluid"
                        alt="world-news"
                    />
                    <span class="thumb-title"> {{$worldNewsPost->news? $worldNewsPost->news->category->title: ''}}</span>
                </div>
                <h5 class="font-weight-bold mt-3">
                    {{$worldNewsPost->news? $worldNewsPost->news->title: ''}}
                </h5>
                <p class="fs-15 font-weight-normal">
                    {{$worldNewsPost->news? $worldNewsPost->news->subTitle: ''}}
                </p>
                <a href="#" class="font-weight-bold text-dark pt-2"
                >Read Article</a
                >
            </div>
            @endforeach
                @endif
        </div>
    </div>
    <div class="editors-news">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex position-relative float-left">
                    <h3 class="section-title">Popular News</h3>
                </div>
            </div>
        </div>
        <div class="row">
{{--            @if($latestNews->count > 0)--}}

            <div class="col-lg-6  mb-5 mb-sm-2">
                @if(isset($latestNews))
                <div class="position-relative image-hover">
                    <img
                        src="{{$latestNews->url}}"
                        class="img-fluid"
                        alt="world-news"
                    />
                    <span class="thumb-title">{{ $latestNews->news->category? $latestNews->news->category->title : ''}}</span>
                </div>
                <h1 class="font-weight-600 mt-3">

                    {{$latestNews->news? $latestNews->news->title: ''}}
                </h1>
                <p class="fs-15 font-weight-normal">
                    {{ $latestNews->news? $latestNews->news->subTitle : '' }}
                </p>
                @endif
            </div>
            <div class="col-lg-6  mb-5 mb-sm-2">
                <div class="row">
                    @if($blogPosts->count() >0)
                    @foreach($blogPosts as $blogPost)
                    <div class="col-sm-6  mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="{{$blogPost->url}}"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">{{$blogPost->post->category? $blogPost->post->category->title : ''}}</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            {{$blogPost->post? $blogPost->post->title : ''}}
                        </h5>
                        <p class="fs-15 font-weight-normal">
                            {!! substr($blogPost->body, 0, 60) !!}
                        </p>
                    </div>
                    @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="popular-news">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex position-relative float-left">
                    <h3 class="section-title">Editor choice</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @if($articles->count())
                    @foreach($articles as $article)
                    <div class="col-sm-4  mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="{{$article->url}}"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">LIFESTYLE</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            {{$article->article->title}}
                        </h5>
                    </div>
                    @endforeach
                        @endif
                </div>

            </div>
            <div class="col-lg-3">
                <div class="position-relative mb-3">
                    <img
                        src="assets/images/dashboard/star-magazine-15.jpg"
                        class="img-fluid"
                        alt="world-news"
                    />
                    <div class="video-thumb text-muted">
                        <span><i class="mdi mdi-menu-right"></i></span>LIVE
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex position-relative float-left">
                            <h3 class="section-title">Latest News</h3>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="border-bottom pb-3">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="border-bottom pt-4 pb-3">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="border-bottom pt-4 pb-3">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="pt-4">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
