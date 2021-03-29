<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaintenanceRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('maintenance_records')->delete();

        \DB::table('maintenance_records')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'item' => 'device',
                    'item_id' => 3,
                    'ng_description' => '电源故障了',
                    'ok_description' => NULL,
                    'ng_time' => '2021-03-24 09:33:07',
                    'ok_time' => NULL,
                    'status' => 0,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-24 09:33:09',
                    'updated_at' => '2021-03-24 09:33:09',
                ),
            1 =>
                array(
                    'id' => 2,
                    'item' => 'device',
                    'item_id' => 1,
                    'ng_description' => '主板爆容',
                    'ok_description' => NULL,
                    'ng_time' => '2021-03-24 16:38:46',
                    'ok_time' => NULL,
                    'status' => 0,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-24 16:38:47',
                    'updated_at' => '2021-03-24 16:38:47',
                ),
        ));


    }
}
