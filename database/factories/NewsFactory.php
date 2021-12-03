<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title  = $this->faker->sentence(3);
        $subTitle  = $this->faker->sentence(6);
        return [
            'title' =>$title ,
            'subTitle' =>$subTitle ,
            'user_id' => rand(1,20),
            'category_id' => rand(1,15),
            'slug' => str::slug($title),
            'body' => $this->faker->sentence(150),
        ];
    }
}
