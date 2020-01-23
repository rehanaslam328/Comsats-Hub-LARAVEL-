<?php

use Illuminate\Database\Seeder;
use App\AcademicPostCategory;
class AcademicPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $academicpostcategory = [
            [
                'type' => 'quiz'

            ],
            [
                'type' => 'assignment'
            ],
            [
                'type' => 'first-sessional'
            ],
            [
                'type' => 'second-sessional'
            ],
            [
                'type' => 'final'
            ]

        ];


        foreach ($academicpostcategory as $key => $value) {
            AcademicPostCategory::create($value);
        }
    }
}
