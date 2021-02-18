<?php

use App\Admin\Controllers\CheckRecordController;
use App\Admin\Controllers\DepartmentController;
use App\Admin\Controllers\DepreciationRuleController;
use App\Admin\Controllers\DeviceCategoryController;
use App\Admin\Controllers\DeviceRecordController;
use App\Admin\Controllers\DeviceStatisticsController;
use App\Admin\Controllers\NotificationController;
use App\Admin\Controllers\PartCategoryController;
use App\Admin\Controllers\PartStatisticsController;
use App\Admin\Controllers\PurchasedChannelController;
use App\Admin\Controllers\ServiceStatisticsController;
use App\Admin\Controllers\SoftwareCategoryController;
use App\Admin\Controllers\SoftwareRecordController;
use App\Admin\Controllers\SoftwareStatisticsController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\VendorRecordController;
use Dcat\Admin\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');

    $router->get('/ldap/test', 'ConfigurationLDAPController@test')->name('ldap.test');

    /**
     * 辅助信息
     */
    $router->get('/version', 'VersionController@index');
    $router->get('/version/remote', 'VersionController@getRemoteVersion')
        ->name('remote');
    $router->get('/version/migrate', 'VersionController@migrate')
        ->name('migrate');
    $router->get('/version/clear', 'VersionController@clear')
        ->name('clear');
    $router->get('/version/upgrade', 'VersionController@upgrade')
        ->name('upgrade');

    /**
     * 配置
     */
    $router->get('/configurations/platform', 'ConfigurationPlatformController@index')
        ->name('configurations.platform.index');
    $router->resource('/configurations/extensions', 'ConfigurationExtensionController')
        ->names('configurations.extensions');
    $router->get('/configurations/ldap', 'ConfigurationLDAPController@index')
        ->name('configurations.ldap.index');

    /**
     * 工具
     */
    $router->get('/tools/qrcode_generator', 'ToolQRCodeGeneratorController@index')
        ->name('qrcode_generator');
    $router->get('/tools/chemex_app', 'ToolChemexAppController@index')
        ->name('chemex_app');

    /**
     * 测试
     */
    $router->get('/test', 'HomeController@test');

    /**
     * 设备管理
     */
    $router->resource('/device/records', 'DeviceRecordController')
        ->names('device.records');
    $router->resource('/device/tracks', 'DeviceTrackController')
        ->names('device.tracks');
    $router->resource('/device/categories', 'DeviceCategoryController')
        ->names('device.categories');
    $router->get('/device/statistics', [DeviceStatisticsController::class, 'index'])
        ->name('device.statistics');
    $router->get('/selection/device/records', [DeviceRecordController::class, 'selectList'])
        ->name('selection.device.records');
    $router->get('/selection/device/categories', [DeviceCategoryController::class, 'selectList'])
        ->name('selection.device.categories');

    /**
     * 配件管理
     */
    $router->resource('/part/records', 'PartRecordController')
        ->names('part.records');
    $router->resource('/part/tracks', 'PartTrackController')
        ->names('part.tracks');
    $router->resource('/part/categories', 'PartCategoryController')
        ->names('part.categories');
    $router->get('/part/statistics', [PartStatisticsController::class, 'index'])
        ->name('part.statistics');
    $router->get('/selection/part/categories', [PartCategoryController::class, 'selectList'])
        ->name('selection.part.categories');

    /**
     * 软件管理
     */
    $router->resource('/software/records', 'SoftwareRecordController')
        ->names('software.records');
    $router->resource('/software/categories', 'SoftwareCategoryController')
        ->names('software.categories');
    $router->resource('/software/tracks', 'SoftwareTrackController')
        ->names('software.tracks');
    $router->get('/software/statistics', [SoftwareStatisticsController::class, 'index'])
        ->name('software.statistics');
    $router->get('/selection/software/categories', [SoftwareCategoryController::class, 'selectList'])
        ->name('selection.software.categories');
    $router->get('/export/software/{software_id}/history', [SoftwareRecordController::class, 'exportHistory'])
        ->name('export.software.history');

    /**
     * 服务管理
     */
    $router->resource('/service/records', 'ServiceRecordController')
        ->names('service.records');
    $router->resource('/service/issues', 'ServiceIssueController')
        ->names('service.issues');
    $router->resource('/service/tracks', 'ServiceTrackController')
        ->names('service.tracks');
    $router->get('/service/statistics', [ServiceStatisticsController::class, 'index'])
        ->name('service.statistics');

    /**
     * 耗材管理
     */
    $router->resource('/consumable/records', 'ConsumableRecordController')
        ->names('consumable.records');
    $router->resource('/consumable/categories', 'ConsumableCategoryController')
        ->names('consumable.categories');
    $router->resource('/consumable/tracks', 'ConsumableTrackController')
        ->names('consumable.tracks');

    /**
     * 待办
     */
    $router->resource('/todo/records', 'TodoRecordController')
        ->names('todo.records');

    /**
     * 厂商管理
     */
    $router->resource('/vendor/records', 'VendorRecordController')
        ->names('vendor.records');
    $router->get('/selection/vendor/records', [VendorRecordController::class, 'selectList'])
        ->name('selection.vendor.records');

    /**
     * 购入途径管理
     */
    $router->resource('/purchased/channels', 'PurchasedChannelController')
        ->names('purchased.channels');
    $router->get('/selection/purchased/channels', [PurchasedChannelController::class, 'selectList'])
        ->name('selection.purchased.channels');

    /**
     * 组织管理
     */
    $router->resource('/organization/users', 'UserController')
        ->names('organization.users');
    $router->resource('/organization/departments', 'DepartmentController')
        ->names('organization.departments');
    $router->resource('/organization/roles', 'RoleController')
        ->names('organization.roles');
    $router->resource('/organization/permissions', 'PermissionController')
        ->names('organization.permissions');
    $router->get('/selection/users', [UserController::class, 'selectList'])
        ->name('selection.organization.users');
    $router->get('/selection/departments', [DepartmentController::class, 'selectList'])
        ->name('selection.organization.departments');

    /**
     * 盘点管理
     */
    $router->resource('/check/records', 'CheckRecordController')
        ->names('check.records');
    $router->resource('/check/tracks', 'CheckTrackController')
        ->names('check.tracks');

    /**
     * 故障维护
     */
    $router->resource('/maintenance/records', 'MaintenanceRecordController')
        ->names('maintenance.records');

    /**
     * 故障维护
     */
    $router->resource('/lend/tracks', 'LendTrackController')
        ->names('lend.tracks');

    /**
     * 折旧规则
     */
    $router->resource('/depreciation/rules', 'DepreciationRuleController')
        ->names('depreciation.rules');
    $router->get('/selection/depreciation/rules', [DepreciationRuleController::class, 'selectList'])
        ->name('selection.depreciation.rules');

    /**
     * 导出
     *///TODO
    $router->get('/export/device/{device_id}/history', [DeviceRecordController::class, 'exportHistory'])
        ->name('export.device.history');
    $router->get('/export/check/{check_id}/report', [CheckRecordController::class, 'exportReport'])
        ->name('export.check.report');

    /**
     * 通知
     */
    $router->get('/notifications/read_all', [NotificationController::class, 'readAll'])
        ->name('notification.read.all');
    $router->get('/notifications/read/{id}', [NotificationController::class, 'read'])
        ->name('notification.read');
});
