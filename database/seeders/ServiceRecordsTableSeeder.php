<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('service_records')->delete();

        \DB::table('service_records')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'AD',
                    'description' => NULL,
                    'status' => 0,
                    'price' => NULL,
                    'purchased' => NULL,
                    'expired' => NULL,
                    'purchased_channel_id' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-26 15:09:16',
                    'updated_at' => '2021-03-26 15:09:16',
                ),
        ));


    }
}
