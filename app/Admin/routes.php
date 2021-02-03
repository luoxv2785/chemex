<?php

use App\Admin\Controllers\CheckRecordController;
use App\Admin\Controllers\DepreciationRuleController;
use App\Admin\Controllers\DeviceCategoryController;
use App\Admin\Controllers\DeviceRecordController;
use App\Admin\Controllers\NotificationController;
use App\Admin\Controllers\PurchasedChannelController;
use App\Admin\Controllers\StaffDepartmentController;
use App\Admin\Controllers\StaffRecordController;
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

    /**
     * 配置
     */
    $router->get('/configurations/platform', 'ConfigurationPlatformController@index')
        ->name('configurations.platform.index');
    $router->resource('/configurations/extensions', 'ConfigurationExtensionController', ['names' => [
        'index' => 'configurations.extensions.index'
    ]]);
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
    $router->resource('/device/records', 'DeviceRecordController', ['names' => [
        'index' => 'device.records.index',
        'show' => 'device.records.show',
        'create' => 'device.records.create'
    ]]);
    $router->resource('/device/tracks', 'DeviceTrackController', ['names' => [
        'index' => 'device.tracks.index',
        'show' => 'device.tracks.show'
    ]]);
    $router->resource('/device/categories', 'DeviceCategoryController', ['names' => [
        'index' => 'device.categories.index',
        'show' => 'device.categories.show',
        'create' => 'device.categories.create'
    ]]);
    $router->get('/selection/device/records', [DeviceRecordController::class, 'selectList'])
        ->name('selection.device.records');
    $router->get('/selection/device/categories', [DeviceCategoryController::class, 'selectList'])
        ->name('selection.device.categories');

    /**
     * 厂商管理
     */
    $router->resource('/vendor/records', 'VendorRecordController', ['names' => [
        'create' => 'vendor.records.create'
    ]]);
    $router->get('/selection/vendor/records', [VendorRecordController::class, 'selectList'])
        ->name('selection.vendor.records');

    /**
     * 购入途径管理
     */
    $router->resource('/purchased/channels', 'PurchasedChannelController', ['names' => [
        'create' => 'purchased.channels.create'
    ]]);
    $router->get('/selection/purchased/channels', [PurchasedChannelController::class, 'selectList'])
        ->name('selection.purchased.channels');

    /**
     * 组织管理
     */
    $router->resource('/staff/records', 'StaffRecordController', ['names' => [
        'index' => 'staff.records.index'
    ]]);
    $router->resource('/staff/departments', 'StaffDepartmentController', ['names' => [
        'index' => 'staff.departments.index'
    ]]);
    $router->get('/selection/staff/records', [StaffRecordController::class, 'selectList'])
        ->name('selection.staff.records');
    $router->get('/selection/staff/departments', [StaffDepartmentController::class, 'selectList'])
        ->name('selection.staff.departments');

    /**
     * 盘点管理
     */
    $router->resource('/check/records', 'CheckRecordController', ['names' => [
        'index' => 'check.records.index',
        'show' => 'check.records.show'
    ]]);
    $router->resource('/check/tracks', 'CheckTrackController', ['names' => [
        'index' => 'check.tracks.index',
        'show' => 'check.tracks.show'
    ]]);

    /**
     * 故障维护
     */
    $router->resource('/maintenance/records', 'MaintenanceRecordController');

    /**
     * 折旧规则
     */
    $router->resource('/depreciation/rules', 'DepreciationRuleController', ['names' => [
        'create' => 'depreciation.rules.create'
    ]]);
    $router->get('/selection/depreciation/rules', [DepreciationRuleController::class, 'selectList'])
        ->name('selection.depreciation.rules');

    /**
     * 图表管理 TODO
     */
    $router->resource('/chart/records', 'ChartRecordController');

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
