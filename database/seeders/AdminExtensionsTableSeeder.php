<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminExtensionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_extensions')->delete();
        
        \DB::table('admin_extensions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'celaraze.chemex-part',
                'version' => '1.0.0',
                'is_enabled' => 1,
                'options' => NULL,
                'created_at' => '2021-01-28 16:17:32',
                'updated_at' => '2021-01-28 16:17:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'celaraze.chemex-service',
                'version' => '1.0.0',
                'is_enabled' => 1,
                'options' => NULL,
                'created_at' => '2021-01-28 16:17:38',
                'updated_at' => '2021-01-28 16:17:39',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'celaraze.chemex-software',
                'version' => '1.0.0',
                'is_enabled' => 1,
                'options' => NULL,
                'created_at' => '2021-01-28 16:17:40',
                'updated_at' => '2021-01-28 16:17:42',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'celaraze.dcat-extension-plus',
                'version' => '1.0.2',
                'is_enabled' => 1,
                'options' => NULL,
                'created_at' => '2021-01-28 16:39:46',
                'updated_at' => '2021-01-28 16:39:47',
            ),
        ));
        
        
    }
}