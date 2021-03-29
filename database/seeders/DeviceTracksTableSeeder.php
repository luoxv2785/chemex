<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeviceTracksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('device_tracks')->delete();
        
        \DB::table('device_tracks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'device_id' => 45,
                'user_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 10:41:55',
                'created_at' => '2021-03-26 10:29:04',
                'updated_at' => '2021-03-26 10:41:55',
            ),
            1 => 
            array (
                'id' => 2,
                'device_id' => 45,
                'user_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 19:47:28',
                'created_at' => '2021-03-26 19:47:05',
                'updated_at' => '2021-03-26 19:47:28',
            ),
            2 => 
            array (
                'id' => 3,
                'device_id' => 45,
                'user_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 19:49:36',
                'created_at' => '2021-03-26 19:47:59',
                'updated_at' => '2021-03-26 19:49:36',
            ),
            3 => 
            array (
                'id' => 4,
                'device_id' => 45,
                'user_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 21:14:36',
                'created_at' => '2021-03-26 21:14:03',
                'updated_at' => '2021-03-26 21:14:36',
            ),
            4 => 
            array (
                'id' => 5,
                'device_id' => 45,
                'user_id' => 2,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 21:14:47',
                'created_at' => '2021-03-26 21:14:40',
                'updated_at' => '2021-03-26 21:14:47',
            ),
            5 => 
            array (
                'id' => 6,
                'device_id' => 45,
                'user_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-27 12:15:11',
                'updated_at' => '2021-03-27 12:15:11',
            ),
            6 => 
            array (
                'id' => 7,
                'device_id' => 46,
                'user_id' => 2,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-27 12:32:37',
                'updated_at' => '2021-03-27 12:32:37',
            ),
        ));
        
        
    }
}