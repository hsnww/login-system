<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Media;
use App\Models\MessagesMeta;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function dashboard()
    {
        $user = Auth()->user()->id;
        $totalInbox = MessagesMeta::where('to', $user )->whereNull('status')->whereNull('read_at')->get();

        return view('admin.index', compact( 'totalInbox'));
    }

    public function homePage()
    {

        $webTitle = 'Fwa tech CMS';
        $mainEmail = User::first();

        $sliderPosts =  Media::whereNotNull('news_id')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();


        $worldNewsPosts = Media::whereNotNull('news_id')
            ->orderBy('created_at', 'DESC')
            ->skip(8)
            ->take(4)
            ->get();

        $latestNews = Media::join('news', 'news.user_id', 'media.user_id')
            ->whereNotNull('news_id')
            ->orderBy('media.created_at', 'DESC')
            ->first();

        $blogPosts = Media::whereNotNull('post_id')->orderBy('created_at', 'DESC')
            ->skip(1)
            ->take(4)
            ->get();

        $articles = Media::whereNotNull('article_id')
            ->orderBy('created_at', 'DESC')
            ->skip(1)
            ->take(6)
            ->get();

        $users = Media::join('articles', 'articles.user_id','=', 'media.profile_id')
            ->whereNotNull('media.user_id')
            ->whereNotNull('articles.user_id')
            ->orderBy('articles.created_at', 'DESC')
            ->take(6)
            ->get();


        return view('home', compact('webTitle'
//                                    , 'bannerTopPosts'
                                                    , 'sliderPosts'
                                                    , 'worldNewsPosts'
                                                    , 'latestNews'
                                                    , 'blogPosts'
                                                    , 'articles'
                                                    , 'mainEmail'
                                                    ,'users'));
    }
}
