<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SoftwareRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('software_records')->delete();
        
        \DB::table('software_records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'JUNYANG LIU',
                'description' => NULL,
                'category_id' => 1,
                'version' => '1.4.3',
                'vendor_id' => 1,
                'price' => 0.0,
                'purchased' => NULL,
                'expired' => NULL,
                'distribution' => 'u',
                'counts' => -1,
                'deleted_at' => '2021-03-24 19:59:18',
                'created_at' => '2021-03-23 20:08:45',
                'updated_at' => '2021-03-24 19:59:18',
                'purchased_channel_id' => NULL,
                'asset_number' => 'BBBB1',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'LIU JUNYANG',
                'description' => NULL,
                'category_id' => 1,
                'version' => '1.4.3',
                'vendor_id' => 1,
                'price' => 5000.0,
                'purchased' => '2021-04-03',
                'expired' => NULL,
                'distribution' => 'u',
                'counts' => -1,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 20:14:40',
                'updated_at' => '2021-03-24 20:14:53',
                'purchased_channel_id' => NULL,
                'asset_number' => 'AAADSAD',
            ),
        ));
        
        
    }
}