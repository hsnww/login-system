<?php

namespace Database\Seeders;
use App\Models\Media;

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/200x200');
            $imgLocation = substr($location[10], 10);

//            \App\Models\Article::factory()->count(30)->create();

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'category_id' => $i,
            ]);

        }
        for($i=1; $i<=15; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/600x300');
            $imgLocation = substr($location[10], 10);

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'post_id' => $i,
            ]);

        }
        for($i=1; $i<=15; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/600x280');
            $imgLocation = substr($location[10], 10);

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'news_id' => $i,
            ]);

        }
        for($i=1; $i<=20; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/80x80');
            $imgLocation = substr($location[10], 10);

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'profile_id' => $i,
            ]);

        }

        for($i=1; $i<=15; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/800x800');
            $imgLocation = substr($location[10], 10);

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'article_id' => $i,
            ]);

        }

        for($i=1; $i<=10; $i++){
            $location = get_headers('https://source.unsplash.com/user/erondu/1200x160');
            $imgLocation = substr($location[10], 10);

            \App\Models\Media::create([
                'file' => 'Default.jpg',
                'url' => $imgLocation,
                'user_id'=> rand(1,20),
                'page_id' => $i,
            ]);

        }

    }
}
