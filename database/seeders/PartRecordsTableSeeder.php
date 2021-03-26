<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('part_records')->delete();
        
        \DB::table('part_records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => NULL,
                'category_id' => 1,
                'vendor_id' => 1,
                'specification' => '123',
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 19:23:28',
                'updated_at' => '2021-03-24 20:14:20',
                'price' => 1780.0,
                'purchased' => '2021-01-02',
                'expired' => NULL,
                'purchased_channel_id' => NULL,
                'depreciation_rule_id' => NULL,
                'asset_number' => 'AAAAA',
            ),
            1 => 
            array (
                'id' => 2,
                'description' => NULL,
                'category_id' => 0,
                'vendor_id' => 1,
                'specification' => '10500',
                'deleted_at' => '2021-03-24 19:56:14',
                'created_at' => '2021-03-23 20:02:19',
                'updated_at' => '2021-03-24 19:56:14',
                'price' => NULL,
                'purchased' => NULL,
                'expired' => NULL,
                'purchased_channel_id' => NULL,
                'depreciation_rule_id' => NULL,
                'asset_number' => 'BBBBbb',
            ),
        ));
        
        
    }
}