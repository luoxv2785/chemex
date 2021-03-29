<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartTracksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('part_tracks')->delete();
        
        \DB::table('part_tracks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'part_id' => 1,
                'device_id' => 1,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 14:59:55',
                'created_at' => '2021-03-18 19:23:35',
                'updated_at' => '2021-03-26 14:59:55',
            ),
            1 => 
            array (
                'id' => 2,
                'part_id' => 1,
                'device_id' => 45,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 15:03:17',
                'created_at' => '2021-03-26 14:59:55',
                'updated_at' => '2021-03-26 15:03:17',
            ),
            2 => 
            array (
                'id' => 3,
                'part_id' => 1,
                'device_id' => 45,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 19:57:25',
                'created_at' => '2021-03-26 19:52:44',
                'updated_at' => '2021-03-26 19:57:25',
            ),
            3 => 
            array (
                'id' => 4,
                'part_id' => 1,
                'device_id' => 45,
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
                'deleted_at' => '2021-03-26 21:19:53',
                'created_at' => '2021-03-26 21:19:49',
                'updated_at' => '2021-03-26 21:19:53',
            ),
        ));
        
        
    }
}