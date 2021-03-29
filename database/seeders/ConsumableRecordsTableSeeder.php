<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsumableRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('consumable_records')->delete();

        \DB::table('consumable_records')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '黑色墨盒',
                    'description' => NULL,
                    'specification' => '10500',
                    'category_id' => 1,
                    'vendor_id' => 1,
                    'price' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-25 09:01:41',
                    'updated_at' => '2021-03-25 09:01:41',
                ),
        ));


    }
}
