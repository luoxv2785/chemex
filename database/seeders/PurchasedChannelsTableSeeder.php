<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchasedChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('purchased_channels')->delete();


    }
}
