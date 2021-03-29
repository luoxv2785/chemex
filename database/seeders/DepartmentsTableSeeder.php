<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('departments')->delete();

        \DB::table('departments')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Domain Controllers',
                    'description' => NULL,
                    'parent_id' => 0,
                    'order' => 0,
                    'ad_tag' => 1,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-27 21:26:23',
                    'updated_at' => '2021-03-27 21:26:23',
                ),
        ));


    }
}
