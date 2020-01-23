<?php

use Illuminate\Database\Seeder;
use App\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = [
            [
                'name' => 'Computer Science'

            ],
            [
                'name' => 'Electrical Engineering'
            ],
            [
                'name' => 'Mathematics'
            ],
            [
                'name' => 'Physics'
            ],
            [
                'name' => 'Management'
            ],
            [
                'name' => 'Pharmacy'
            ]

        ];


        foreach ($departments as $key => $value) {
            Department::create($value);
        }
    }
}
