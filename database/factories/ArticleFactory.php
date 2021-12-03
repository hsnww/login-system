<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title  = $this->faker->sentence(3);

        return [
            'title' =>$title ,
            'category_id' =>rand(1,15) ,
            'slug' => str::slug($title),
            'author_name' => $this->faker->name(),
            'user_id' => rand(1,20),
            'description' => $this->faker->paragraph(),
            'body' => $this->faker->sentence(70),
        ];
    }
}
