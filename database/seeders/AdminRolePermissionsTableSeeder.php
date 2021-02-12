<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminRolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('admin_role_permissions')->delete();

        DB::table('admin_role_permissions')->insert(array(
            0 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 51,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            1 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 53,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 55,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            3 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 57,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            4 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 59,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            5 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 61,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            6 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 63,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            7 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 65,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            8 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 67,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            9 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 69,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            10 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 74,
                    'created_at' => '2021-01-28 20:36:29',
                    'updated_at' => '2021-01-28 20:36:29',
                ),
            11 =>
                array(
                    'role_id' => 2,
                    'permission_id' => 77,
                    'created_at' => '2021-01-28 20:36:29',
                    'updated_at' => '2021-01-28 20:36:29',
                ),
        ));


    }
}
