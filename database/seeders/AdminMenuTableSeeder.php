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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
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
                'show' => 1,
                'extension' => '',
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-05-13 08:10:38',
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 16,
                'order' => 17,
                'title' => 'Chemex App',
                'icon' => '',
                'uri' => 'tools/chemex_app',
                'show' => 0,
                'extension' => '',
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-05-13 08:10:38',
            ),
            16 => 
            array (
                'id' => 18,
                'parent_id' => 16,
                'order' => 18,
                'title' => 'QRCode Generator',
                'icon' => '',
                'uri' => 'tools/qrcode_generator',
                'show' => 1,
                'extension' => '',
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-05-13 08:10:38',
            ),
            17 => 
            array (
                'id' => 36,
                'parent_id' => 0,
                'order' => 12,
                'title' => 'Additional Options',
                'icon' => 'feather icon-file-text',
                'uri' => NULL,
                'show' => 1,
                'extension' => '',
                'created_at' => NULL,
                'updated_at' => '2021-03-07 10:08:53',
            ),
            18 => 
            array (
                'id' => 37,
                'parent_id' => 0,
                'order' => 21,
                'title' => 'Setting',
                'icon' => 'feather icon-settings',
                'uri' => 'site/setting',
                'show' => 1,
                'extension' => '',
                'created_at' => '2021-03-18 16:13:49',
                'updated_at' => '2021-05-13 08:11:00',
            ),
        ));
        
        
    }
}