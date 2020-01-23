<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
//            [
//                'name' => 'user-view',
//                'display_name' => 'Display Users Listing',
//                'description' => 'See only Listing Of User'
//            ],
//            [
//                'name' => 'user-create',
//                'display_name' => 'Create User',
//                'description' => 'Create New User'
//            ],
//            [
//                'name' => 'user-edit',
//                'display_name' => 'Edit User',
//                'description' => 'Edit User'
//            ],
//            [
//                'name' => 'user-delete',
//                'display_name' => 'Delete User',
//                'description' => 'Delete User'
//            ],
//            [
//                'name' => 'role-view',
//                'display_name' => 'Display Role Listing',
//                'description' => 'See only Listing Of Role'
//            ],
//            [
//                'name' => 'role-create',
//                'display_name' => 'Create Role',
//                'description' => 'Create New Role'
//            ],
//            [
//                'name' => 'role-edit',
//                'display_name' => 'Edit Role',
//                'description' => 'Edit Role'
//            ],
//            [
//                'name' => 'role-delete',
//                'display_name' => 'Delete Role',
//                'description' => 'Delete Role'
//            ],
//            [
//                'name' => 'post-view',
//                'display_name' => 'Display Post Listing',
//                'description' => 'See only Listing Of Post'
//            ],
//            [
//                'name' => 'post-create',
//                'display_name' => 'Create Post',
//                'description' => 'Create New Post'
//            ],
//            [
//                'name' => 'post-edit',
//                'display_name' => 'Edit Post',
//                'description' => 'Edit Post'
//            ],
//            [
//                'name' => 'post-delete',
//                'display_name' => 'Delete Post',
//                'description' => 'Delete Post'
//            ],
//            [
//                'name' => 'view-public-post',
//                'display_name' => 'View Post',
//                'description' => 'View Post'
//            ],
//            [
//                'name' => 'view-private-post',
//                'display_name' => 'View Post',
//                'description' => 'View Post'
//
//            ],
            [
                'name' => 'ad-create',
                'display_name' => 'Create ad',
                'description' => 'poast an ad on the website'

            ],
            [
                'name' => 'ad-view',
                'display_name' => 'View ad',
                'description' => 'View an ad on the website'

            ],
            [
                'name' => 'ad-edit',
                'display_name' => 'Edit ad',
                'description' => 'Edit an ad on the website'

            ],
            [
                'name' => 'ad-delete',
                'display_name' => 'Delete ad',
                'description' => 'Delete an ad on the website'

            ]

        ];


        foreach ($permission as $key => $value) {
            Permission::create($value);
        }


    }
}
