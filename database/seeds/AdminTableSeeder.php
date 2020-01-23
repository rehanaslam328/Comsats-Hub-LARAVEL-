<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'wasim',
                'lastname' => 'wasim',
                'email' => 'wasim@gmail.com',
                'password' => Hash::make('123456'),
                'day' => '1',
                'month' => '8',
                'year' => '1998',
                'optradio' => 'male',
                'city' => 'lahore',
                'country' => 'Pakistan',
                'dept_id' => '1',
            ],
            [
                'firstname' => 'raheem',
                'lastname' => 'raheem',
                'email' => 'raheem@gmail.com',
                'password' => Hash::make('123456'),
                'day' => '1',
                'month' => '8',
                'year' => '1998',
                'optradio' => 'male',
                'city' => 'lahore',
                'country' => 'Pakistan',
                'dept_id' => '1',
            ],
            [
                'firstname' => 'mahnoor',
                'lastname' => 'mahnoor',
                'email' => 'mahnoor@gmail.com',
                'password' => Hash::make('123456'),
                'day' => '1',
                'month' => '8',
                'year' => '1998',
                'optradio' => 'male',
                'city' => 'lahore',
                'country' => 'Pakistan',
                'dept_id' => '1',
            ],
            [
                'firstname' => 'user',
                'lastname' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'day' => '1',
                'month' => '8',
                'year' => '1998',
                'optradio' => 'male',
                'city' => 'lahore',
                'country' => 'Pakistan',
                'dept_id' => '1',
            ]

        ];


        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
