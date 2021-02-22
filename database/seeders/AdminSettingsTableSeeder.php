<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admin_settings')->delete();

        \DB::table('admin_settings')->insert(array(
            0 =>
                array(
                    'slug' => 'field_select_create',
                    'value' => '1',
                    'created_at' => '2021-01-28 16:47:28',
                    'updated_at' => '2021-01-28 16:47:28',
                ),
            1 =>
                array(
                    'slug' => 'footer_remove',
                    'value' => '1',
                    'created_at' => '2021-01-28 16:47:25',
                    'updated_at' => '2021-01-28 16:47:25',
                ),
            2 =>
                array(
                    'slug' => 'grid_row_actions_right',
                    'value' => '0',
                    'created_at' => '2021-02-09 14:16:58',
                    'updated_at' => '2021-02-17 16:49:13',
                ),
            3 =>
                array(
                    'slug' => 'header_blocks',
                    'value' => '1',
                    'created_at' => '2021-01-28 16:47:25',
                    'updated_at' => '2021-01-28 16:47:25',
                ),
            4 =>
                array(
                    'slug' => 'header_padding_fix',
                    'value' => '1',
                    'created_at' => '2021-02-22 08:47:24',
                    'updated_at' => '2021-02-22 08:47:24',
                ),
            5 =>
                array(
                    'slug' => 'sidebar_indentation',
                    'value' => '1',
                    'created_at' => '2021-01-28 16:47:25',
                    'updated_at' => '2021-01-28 16:47:25',
                ),
            6 =>
                array(
                    'slug' => 'sidebar_style',
                    'value' => 'horizontal_menu',
                    'created_at' => '2021-01-28 16:47:25',
                    'updated_at' => '2021-02-22 08:47:24',
                ),
            7 =>
                array(
                    'slug' => 'site_debug',
                    'value' => '0',
                    'created_at' => '2021-01-28 16:47:03',
                    'updated_at' => '2021-01-28 16:47:17',
                ),
        ));


    }
}
