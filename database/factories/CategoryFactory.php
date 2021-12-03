<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
//use Faker\Generator as Faker;


class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'slug' => str::slug($title),
            'description' => $this->faker->sentence(7),
            'root' => rand(0,3),

        ];
    }
}
