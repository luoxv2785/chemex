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
        
        \DB::table('admin_settings')->insert(array (
            0 => 
            array (
                'slug' => 'ad_base_dn',
                'value' => 'dc=chemex,dc=test',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:19:01',
            ),
            1 => 
            array (
                'slug' => 'ad_bind_administrator',
                'value' => 'administrator@chemex.test',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:19:01',
            ),
            2 => 
            array (
                'slug' => 'ad_enabled',
                'value' => '1',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:55',
            ),
            3 => 
            array (
                'slug' => 'ad_host_primary',
                'value' => '221.224.127.58',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:49',
            ),
            4 => 
            array (
                'slug' => 'ad_host_secondary',
                'value' => '',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:49',
            ),
            5 => 
            array (
                'slug' => 'ad_login',
                'value' => '1',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 21:07:55',
            ),
            6 => 
            array (
                'slug' => 'ad_password',
                'value' => 'famio.cn@0625',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:49',
            ),
            7 => 
            array (
                'slug' => 'ad_port_primary',
                'value' => '20389',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:18:23',
            ),
            8 => 
            array (
                'slug' => 'ad_port_secondary',
                'value' => '0',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:49',
            ),
            9 => 
            array (
                'slug' => 'ad_use_ssl',
                'value' => '0',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 21:03:31',
            ),
            10 => 
            array (
                'slug' => 'ad_use_tls',
                'value' => '0',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 20:16:49',
            ),
            11 => 
            array (
                'slug' => 'ad_username',
                'value' => 'administrator@chemex.test',
                'created_at' => '2021-03-27 20:16:49',
                'updated_at' => '2021-03-27 21:03:52',
            ),
            12 => 
            array (
                'slug' => 'field_select_create',
                'value' => '1',
                'created_at' => '2021-01-28 16:47:28',
                'updated_at' => '2021-01-28 16:47:28',
            ),
            13 => 
            array (
                'slug' => 'footer_remove',
                'value' => '1',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-01-28 16:47:25',
            ),
            14 => 
            array (
                'slug' => 'grid_row_actions_right',
                'value' => '0',
                'created_at' => '2021-02-09 14:16:58',
                'updated_at' => '2021-02-17 16:49:13',
            ),
            15 => 
            array (
                'slug' => 'header_blocks',
                'value' => '1',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-01-28 16:47:25',
            ),
            16 => 
            array (
                'slug' => 'header_padding_fix',
                'value' => '1',
                'created_at' => '2021-02-22 08:47:24',
                'updated_at' => '2021-02-22 08:47:24',
            ),
            17 => 
            array (
                'slug' => 'sidebar_indentation',
                'value' => '1',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-01-28 16:47:25',
            ),
            18 => 
            array (
                'slug' => 'sidebar_style',
                'value' => 'horizontal_menu',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-02-22 08:47:24',
            ),
            19 => 
            array (
                'slug' => 'site_debug',
                'value' => '1',
                'created_at' => '2021-01-28 16:47:03',
                'updated_at' => '2021-01-28 16:47:17',
            ),
            20 => 
            array (
                'slug' => 'site_lang',
                'value' => 'zh_CN',
                'created_at' => '2021-01-28 16:47:03',
                'updated_at' => '2021-02-08 08:12:47',
            ),
            21 => 
            array (
                'slug' => 'site_logo',
                'value' => '',
                'created_at' => '2020-12-20 13:57:11',
                'updated_at' => '2020-12-20 13:57:11',
            ),
            22 => 
            array (
                'slug' => 'site_logo_mini',
                'value' => '',
                'created_at' => '2020-12-20 13:57:11',
                'updated_at' => '2020-12-20 13:57:11',
            ),
            23 => 
            array (
                'slug' => 'site_logo_text',
                'value' => '咖啡壶',
                'created_at' => '2020-12-20 13:57:11',
                'updated_at' => '2021-01-28 20:34:45',
            ),
            24 => 
            array (
                'slug' => 'site_title',
                'value' => '咖啡壶',
                'created_at' => '2020-12-20 13:57:11',
                'updated_at' => '2021-01-28 20:34:45',
            ),
            25 => 
            array (
                'slug' => 'site_url',
                'value' => 'http://127.0.0.1:8000',
                'created_at' => '2021-01-28 16:47:03',
                'updated_at' => '2021-03-22 15:22:57',
            ),
            26 => 
            array (
                'slug' => 'switch_to_filter_panel',
                'value' => '1',
                'created_at' => '2021-03-24 16:43:57',
                'updated_at' => '2021-03-24 16:43:57',
            ),
            27 => 
            array (
                'slug' => 'switch_to_select_create',
                'value' => '0',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-03-24 20:13:27',
            ),
            28 => 
            array (
                'slug' => 'theme_color',
                'value' => 'blue-light',
                'created_at' => '2021-01-28 16:47:25',
                'updated_at' => '2021-01-28 16:47:25',
            ),
        ));
        
        
    }
}