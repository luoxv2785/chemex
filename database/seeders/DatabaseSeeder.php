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
        //
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminExtensionHistoriesTableSeeder::class);
        $this->call(AdminExtensionsTableSeeder::class);
        $this->call(AdminMenuTableSeeder::class);
        $this->call(AdminPermissionMenuTableSeeder::class);
        $this->call(AdminRoleMenuTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(AdminRoleUsersTableSeeder::class);
        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminSettingsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(ChartRecordsTableSeeder::class);
        $this->call(CheckRecordsTableSeeder::class);
        $this->call(CheckTracksTableSeeder::class);
        $this->call(ColumnSortsTableSeeder::class);
        $this->call(ConsumableCategoriesTableSeeder::class);
        $this->call(ConsumableRecordsTableSeeder::class);
        $this->call(ConsumableTracksTableSeeder::class);
        $this->call(CustomColumnsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DepreciationRulesTableSeeder::class);
        $this->call(DeviceCategoriesTableSeeder::class);
        $this->call(DeviceRecordsTableSeeder::class);
        $this->call(DeviceTracksTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(MaintenanceRecordsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PartCategoriesTableSeeder::class);
        $this->call(PartRecordsTableSeeder::class);
        $this->call(PartTracksTableSeeder::class);
        $this->call(PurchasedChannelsTableSeeder::class);
        $this->call(ServiceIssuesTableSeeder::class);
        $this->call(ServiceRecordsTableSeeder::class);
        $this->call(ServiceTracksTableSeeder::class);
        $this->call(SoftwareCategoriesTableSeeder::class);
        $this->call(SoftwareRecordsTableSeeder::class);
        $this->call(SoftwareTracksTableSeeder::class);
        $this->call(StaffRecordsTableSeeder::class);
        $this->call(TodoHistoriesTableSeeder::class);
        $this->call(TodoRecordsTableSeeder::class);
        $this->call(VendorRecordsTableSeeder::class);
    }
}
