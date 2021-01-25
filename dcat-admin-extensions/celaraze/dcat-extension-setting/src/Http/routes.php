<?php

use Celaraze\DcatSetting\Http\Controllers\DcatSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/settings/site', [DcatSettingController::class, 'index'])
    ->name('settings.site.index');
