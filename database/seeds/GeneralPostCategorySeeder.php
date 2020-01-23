<?php

use Illuminate\Database\Seeder;
use App\GeneralPostCategory;
class GeneralPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $generalpostcategories = [
            [
                'type' => 'Photo'

            ],
            [
                'type' => 'Video'
            ]


        ];


        foreach ($generalpostcategories as $key => $value) {
            GeneralPostCategory::create($value);
        }
    }
}
