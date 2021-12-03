<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MessagesMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MessagesMeta::factory()->count(65)->create();
    }
}
