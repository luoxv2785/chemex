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
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '',
                'description' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'ad_tag' => 0,
                'deleted_at' => NULL,
                'created_at' => '2021-03-25 08:56:41',
                'updated_at' => '2021-03-25 08:56:41',
            ),
        ));
        
        
    }
}