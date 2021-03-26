<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomColumnsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('custom_columns')->delete();
        
        
        
    }
}