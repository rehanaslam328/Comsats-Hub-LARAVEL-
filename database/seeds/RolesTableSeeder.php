<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
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
                'name' => 'admin',
                'display_name' => 'super-admin',
                'description' => 'Control whole site'
            ],
            [
                'name' => 'moderator',
                'display_name' => 'moderator of site',
                'description' => 'moderator works as the manager of the site'
            ],
            [
                'name' => 'student',
                'display_name' => 'student of site',
                'description' => 'student works as the student of the site'
            ],
            [
                'name' => 'faculty',
                'display_name' => 'faculty of site',
                'description' => 'faculty works as the faculty of the site'
            ]

        ];


        foreach ($roles as $key => $value) {
            Role::create($value);
        }

    }
}
