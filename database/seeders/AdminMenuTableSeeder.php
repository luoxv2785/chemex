<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'feather icon-bar-chart-2',
                'uri' => '/',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:20',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Maintenance',
                'icon' => 'feather icon-shield',
                'uri' => 'maintenance/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:15',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Todo Records',
                'icon' => 'feather icon-list',
                'uri' => 'todo/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-02 15:32:23',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 0,
                'order' => 4,
                'title' => 'Assets',
                'icon' => NULL,
                'uri' => NULL,
                'extension' => '',
                'show' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-03-07 10:08:53',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 0,
                'order' => 10,
                'title' => 'Organization',
                'icon' => 'feather icon-user-check',
                'uri' => 'organization/users',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:25',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 0,
                'order' => 11,
                'title' => 'Check',
                'icon' => 'feather icon-check-circle',
                'uri' => 'check/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-04 10:22:42',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 36,
                'order' => 13,
                'title' => 'Vendor Records',
                'icon' => 'feather icon-zap',
                'uri' => 'vendor/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:23',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 36,
                'order' => 14,
                'title' => 'Purchased Channels',
                'icon' => 'feather icon-shopping-cart',
                'uri' => 'purchased/channels',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-18 21:08:58',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 36,
                'order' => 15,
                'title' => 'Depreciation Rules',
                'icon' => 'feather icon-trending-down',
                'uri' => 'depreciation/rules',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            9 => 
            array (
                'id' => 11,
                'parent_id' => 4,
                'order' => 5,
                'title' => 'Device',
                'icon' => 'feather icon-monitor',
                'uri' => 'device/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:25',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            10 => 
            array (
                'id' => 12,
                'parent_id' => 4,
                'order' => 6,
                'title' => 'Part',
                'icon' => 'feather icon-server',
                'uri' => 'part/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-02 14:09:30',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            11 => 
            array (
                'id' => 13,
                'parent_id' => 4,
                'order' => 7,
                'title' => 'Software',
                'icon' => 'feather icon-disc',
                'uri' => 'software/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-02 14:09:45',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 4,
                'order' => 9,
                'title' => 'Service',
                'icon' => 'feather icon-activity',
                'uri' => 'service/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-02 14:09:37',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 4,
                'order' => 8,
                'title' => 'Consumable',
                'icon' => 'feather icon-codepen',
                'uri' => 'consumable/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-02 15:32:04',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            14 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 16,
                'title' => 'Tools',
                'icon' => 'feather icon-layers',
                'uri' => '',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-02-24 08:33:39',
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 16,
                'order' => 17,
                'title' => 'Chemex App',
                'icon' => '',
                'uri' => 'tools/chemex_app',
                'extension' => '',
                'show' => 0,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-02-24 08:33:39',
            ),
            16 => 
            array (
                'id' => 18,
                'parent_id' => 16,
                'order' => 18,
                'title' => 'QRCode Generator',
                'icon' => '',
                'uri' => 'tools/qrcode_generator',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-02-24 08:33:39',
            ),
            17 => 
            array (
                'id' => 19,
                'parent_id' => 0,
                'order' => 19,
                'title' => 'Settings',
                'icon' => 'feather icon-settings',
                'uri' => NULL,
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:23:14',
                'updated_at' => '2021-02-24 08:33:39',
            ),
            18 => 
            array (
                'id' => 21,
                'parent_id' => 19,
                'order' => 23,
                'title' => 'Version',
                'icon' => '',
                'uri' => 'version',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-22 15:05:00',
                'updated_at' => '2021-03-07 10:08:53',
            ),
            19 => 
            array (
                'id' => 30,
                'parent_id' => 19,
                'order' => 21,
                'title' => 'Menu',
                'icon' => NULL,
                'uri' => 'menu',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-02-23 08:15:41',
                'updated_at' => '2021-02-24 08:33:39',
            ),
            20 => 
            array (
                'id' => 36,
                'parent_id' => 0,
                'order' => 12,
                'title' => 'Additional Options',
                'icon' => 'feather icon-file-text',
                'uri' => NULL,
                'extension' => '',
                'show' => 1,
                'created_at' => NULL,
                'updated_at' => '2021-03-07 10:08:53',
            ),
            21 => 
            array (
                'id' => 37,
                'parent_id' => 19,
                'order' => 20,
                'title' => 'Setting',
                'icon' => NULL,
                'uri' => 'site/setting',
                'extension' => '',
                'show' => 1,
                'created_at' => '2021-03-18 16:13:49',
                'updated_at' => '2021-03-18 16:14:17',
            ),
        ));
        
        
    }
}