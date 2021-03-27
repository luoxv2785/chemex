<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsumableCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('consumable_categories')->delete();
        
        \DB::table('consumable_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '墨盒',
                'description' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'deleted_at' => NULL,
                'created_at' => '2021-03-25 09:01:26',
                'updated_at' => '2021-03-25 09:01:26',
            ),
        ));
        
        
    }
}