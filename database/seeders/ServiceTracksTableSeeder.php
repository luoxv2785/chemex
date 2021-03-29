<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTracksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('service_tracks')->delete();

        \DB::table('service_tracks')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'service_id' => 1,
                    'device_id' => 45,
                    'deleted_at' => '2021-03-26 19:57:07',
                    'created_at' => '2021-03-26 15:09:22',
                    'updated_at' => '2021-03-26 19:57:07',
                ),
            1 =>
                array(
                    'id' => 2,
                    'service_id' => 1,
                    'device_id' => 45,
                    'deleted_at' => '2021-03-26 21:23:32',
                    'created_at' => '2021-03-26 21:23:29',
                    'updated_at' => '2021-03-26 21:23:32',
                ),
        ));


    }
}
