<?php

/**
 * 服务管理
 */


use Celaraze\Chemex\Service\Http\Controllers\ServiceIssueController;
use Celaraze\Chemex\Service\Http\Controllers\ServiceRecordController;
use Celaraze\Chemex\Service\Http\Controllers\ServiceTrackController;
use Illuminate\Support\Facades\Route;

Route::resource('/service/records', ServiceRecordController::class, ['names' => [
    'index' => 'service.records.index',
    'show' => 'service.records.show'
]]);
Route::resource('/service/issues', ServiceIssueController::class, ['names' => [
    'index' => 'service.issues.index'
]]);
Route::resource('/service/tracks', ServiceTrackController::class, ['names' => [
    'index' => 'service.tracks.index'
]]);
