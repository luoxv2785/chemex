<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepreciationRulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('depreciation_rules')->delete();


    }
}
