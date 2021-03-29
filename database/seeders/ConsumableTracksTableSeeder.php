<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsumableTracksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('consumable_tracks')->delete();

        \DB::table('consumable_tracks')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'consumable_id' => 1,
                    'user_id' => 0,
                    'number' => 100.0,
                    'purchased' => NULL,
                    'expired' => NULL,
                    'change' => 100.0,
                    'description' => NULL,
                    'deleted_at' => '2021-03-25 09:58:36',
                    'created_at' => '2021-03-25 09:02:01',
                    'updated_at' => '2021-03-25 09:58:36',
                ),
            1 =>
                array(
                    'id' => 2,
                    'consumable_id' => 1,
                    'user_id' => 1,
                    'number' => 98.0,
                    'purchased' => NULL,
                    'expired' => NULL,
                    'change' => 2.0,
                    'description' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-25 09:58:36',
                    'updated_at' => '2021-03-25 09:58:36',
                ),
        ));


    }
}
