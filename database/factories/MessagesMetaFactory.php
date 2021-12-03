<?php

namespace Database\Factories;

use App\Models\MessagesMeta;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessagesMetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessagesMeta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_id' => rand(1,35),
            'user_id' => rand(1,20),
            'to' => rand(1,20),
        ];
    }
}
