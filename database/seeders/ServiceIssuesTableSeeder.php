<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceIssuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_issues')->delete();
        
        
        
    }
}