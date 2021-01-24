<?php

/**
 * 软件管理
 */

use Celaraze\Chemex\Software\Http\Controllers\SoftwareCategoryController;
use Celaraze\Chemex\Software\Http\Controllers\SoftwareRecordController;
use Celaraze\Chemex\Software\Http\Controllers\SoftwareTrackController;
use Illuminate\Support\Facades\Route;

Route::resource('/software/records', SoftwareRecordController::class, ['names' => [
    'index' => 'software.records.index',
    'show' => 'software.records.show'
]]);
Route::resource('/software/categories', SoftwareCategoryController::class, ['names' => [
    'index' => 'software.categories.index',
    'show' => 'software.categories.show'
]]);
Route::resource('/software/tracks', SoftwareTrackController::class, ['names' => [
    'index' => 'software.tracks.index',
    'show' => 'software.tracks.show'
]]);
Route::get('/export/software/{software_id}/history', [SoftwareRecordController::class, 'exportHistory'])
    ->name('export.software.history');
