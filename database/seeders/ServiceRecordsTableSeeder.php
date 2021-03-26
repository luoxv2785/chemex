<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_records')->delete();
        
        
        
    }
}