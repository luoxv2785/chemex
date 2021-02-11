<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminMenuTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(AdminSettingsTableSeeder::class);
        $this->call(AdminExtensionsTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
    }
}
