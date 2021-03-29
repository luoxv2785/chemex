<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CheckRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('check_records')->delete();
        
        \DB::table('check_records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'check_item' => 'device',
                'start_time' => '2021-03-24 09:33:46',
                'end_time' => '2021-03-24 09:33:47',
                'user_id' => 1,
                'status' => 0,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 09:33:49',
                'updated_at' => '2021-03-24 09:33:49',
            ),
        ));
        
        
    }
}