<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'name' => 'Admin',
            ],
            [
                'name' => 'Moderator',
            ],
            [
                'name' => 'Editor',
            ],
            [
                'name' => 'Publisher',
            ],
            [
                'name' => "Author",
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
