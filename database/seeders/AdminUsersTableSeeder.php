<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('admin_users')->delete();

        DB::table('admin_users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$0n9/R3I1ZOCsDKGyP.7I8ed5B90mppdqFQ9b9m6tD1bua7SKVx4HS',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-11-30 09:58:49',
                'updated_at' => '2021-02-11 20:28:17',
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'username' => 'test',
                'password' => '$2y$10$EwI3BHxoiPIj6D8sLRkCYuet5Ee2ZuSHntl/7.h/46AIfZY846ydC',
                'name' => '测试用户',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-02-11 21:18:42',
                'updated_at' => '2021-02-11 21:18:42',
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'deleted_at' => NULL,
            ),
        ));


    }
}
