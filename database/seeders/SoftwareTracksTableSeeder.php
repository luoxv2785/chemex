<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SoftwareTracksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('software_tracks')->delete();

        \DB::table('software_tracks')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'software_id' => 2,
                    'device_id' => 45,
                    'lend_time' => NULL,
                    'lend_description' => NULL,
                    'plan_return_time' => NULL,
                    'return_time' => NULL,
                    'return_description' => NULL,
                    'deleted_at' => '2021-03-26 15:06:58',
                    'created_at' => '2021-03-26 15:06:48',
                    'updated_at' => '2021-03-26 15:06:58',
                ),
            1 =>
                array(
                    'id' => 2,
                    'software_id' => 2,
                    'device_id' => 45,
                    'lend_time' => NULL,
                    'lend_description' => NULL,
                    'plan_return_time' => NULL,
                    'return_time' => NULL,
                    'return_description' => NULL,
                    'deleted_at' => '2021-03-26 15:09:06',
                    'created_at' => '2021-03-26 15:07:09',
                    'updated_at' => '2021-03-26 15:09:06',
                ),
        ));


    }
}
