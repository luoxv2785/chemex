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
                'updated_at' => '2020-12-29 21:39:06',
            ),
            1 => 
            array (
                'id' => 11,
                'parent_id' => 0,
                'order' => 13,
                'title' => 'Vendor Records',
                'icon' => 'feather icon-zap',
                'uri' => 'vendor/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:23',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            2 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Device Management',
                'icon' => 'feather icon-monitor',
                'uri' => '',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:25',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            3 => 
            array (
                'id' => 17,
                'parent_id' => 16,
                'order' => 5,
                'title' => 'Device Categories',
                'icon' => '',
                'uri' => 'device/categories',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:27',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            4 => 
            array (
                'id' => 18,
                'parent_id' => 0,
                'order' => 7,
                'title' => 'Staff Management',
                'icon' => 'feather icon-user-check',
                'uri' => '',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:25',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            5 => 
            array (
                'id' => 19,
                'parent_id' => 18,
                'order' => 9,
                'title' => 'Staff Departments',
                'icon' => '',
                'uri' => 'staff/departments',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:27',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            6 => 
            array (
                'id' => 20,
                'parent_id' => 18,
                'order' => 8,
                'title' => 'Staff Records',
                'icon' => '',
                'uri' => 'staff/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:26',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            7 => 
            array (
                'id' => 21,
                'parent_id' => 16,
                'order' => 4,
                'title' => 'Device Records',
                'icon' => '',
                'uri' => 'device/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:28',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            8 => 
            array (
                'id' => 24,
                'parent_id' => 16,
                'order' => 6,
                'title' => 'Device Tracks',
                'icon' => '',
                'uri' => 'device/tracks',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:29',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            9 => 
            array (
                'id' => 25,
                'parent_id' => 0,
                'order' => 10,
                'title' => 'Check Management',
                'icon' => 'feather icon-check-circle',
                'uri' => NULL,
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-04 10:22:42',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            10 => 
            array (
                'id' => 26,
                'parent_id' => 25,
                'order' => 11,
                'title' => 'Check Records',
                'icon' => NULL,
                'uri' => 'check/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-04 10:23:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            11 => 
            array (
                'id' => 27,
                'parent_id' => 25,
                'order' => 12,
                'title' => 'Check Tracks',
                'icon' => NULL,
                'uri' => 'check/tracks',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-04 10:23:33',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            12 => 
            array (
                'id' => 53,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Maintenance Records',
                'icon' => 'feather icon-shield',
                'uri' => 'maintenance/records',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-10 15:06:15',
                'updated_at' => '2020-12-19 01:10:21',
            ),
            13 => 
            array (
                'id' => 54,
                'parent_id' => 56,
                'order' => 27,
                'title' => 'Version',
                'icon' => 'feather icon-chevrons-down',
                'uri' => 'version',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-10-22 15:05:00',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            14 => 
            array (
                'id' => 55,
                'parent_id' => 56,
                'order' => 26,
                'title' => 'Menu',
                'icon' => NULL,
                'uri' => 'auth/menu',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:22:49',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            15 => 
            array (
                'id' => 56,
                'parent_id' => 0,
                'order' => 19,
                'title' => 'Settings',
                'icon' => 'feather icon-settings',
                'uri' => NULL,
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:23:14',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            16 => 
            array (
                'id' => 57,
                'parent_id' => 56,
                'order' => 23,
                'title' => 'Users',
                'icon' => NULL,
                'uri' => 'auth/users',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:25:13',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            17 => 
            array (
                'id' => 58,
                'parent_id' => 56,
                'order' => 24,
                'title' => 'Roles',
                'icon' => NULL,
                'uri' => 'auth/roles',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:25:25',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            18 => 
            array (
                'id' => 59,
                'parent_id' => 56,
                'order' => 25,
                'title' => 'Permissions',
                'icon' => NULL,
                'uri' => 'auth/permissions',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-03 14:26:37',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            19 => 
            array (
                'id' => 60,
                'parent_id' => 0,
                'order' => 14,
                'title' => 'Purchased Channels',
                'icon' => 'feather icon-shopping-cart',
                'uri' => 'purchased/channels',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-11-18 21:08:58',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            20 => 
            array (
                'id' => 61,
                'parent_id' => 0,
                'order' => 15,
                'title' => 'Depreciation Rules',
                'icon' => 'feather icon-trending-down',
                'uri' => '/depreciation/rules',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            21 => 
            array (
                'id' => 62,
                'parent_id' => 56,
                'order' => 21,
                'title' => 'Configuration Platform',
                'icon' => NULL,
                'uri' => '/configurations/platform',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            22 => 
            array (
                'id' => 63,
                'parent_id' => 0,
                'order' => 16,
                'title' => 'Tools',
                'icon' => 'feather icon-layers',
                'uri' => '',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            23 => 
            array (
                'id' => 64,
                'parent_id' => 63,
                'order' => 17,
                'title' => 'Chemex App',
                'icon' => '',
                'uri' => '/tools/chemex_app',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            24 => 
            array (
                'id' => 65,
                'parent_id' => 63,
                'order' => 18,
                'title' => 'QRCode Generator',
                'icon' => '',
                'uri' => '/tools/qrcode_generator',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-14 19:38:17',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            25 => 
            array (
                'id' => 66,
                'parent_id' => 56,
                'order' => 22,
                'title' => 'Configuration LDAP',
                'icon' => NULL,
                'uri' => '/configurations/ldap',
                'extension' => '',
                'show' => 1,
                'created_at' => '2020-12-24 21:21:27',
                'updated_at' => '2021-01-28 20:35:19',
            ),
            26 => 
            array (
                'id' => 79,
                'parent_id' => 56,
                'order' => 20,
                'title' => 'Dcat Plus',
                'icon' => 'feather icon-settings',
                'uri' => 'dcat-plus/site',
                'extension' => 'celaraze.dcat-extension-plus',
                'show' => 1,
                'created_at' => '2021-01-28 16:39:46',
                'updated_at' => '2021-01-28 20:35:19',
            ),
        ));
        
        
    }
}