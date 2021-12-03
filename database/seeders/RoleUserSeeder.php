<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_id' => '1',
                'user_id' => '1',
            ],
        ];

        foreach ($roles as $role) {
            RoleUser::create($role);
        }

    }
}
