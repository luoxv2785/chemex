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
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 19:23:35',
                'updated_at' => '2021-03-18 19:23:35',
                'lend_time' => NULL,
                'lend_description' => NULL,
                'plan_return_time' => NULL,
                'return_time' => NULL,
                'return_description' => NULL,
            ),
        ));
        
        
    }
}