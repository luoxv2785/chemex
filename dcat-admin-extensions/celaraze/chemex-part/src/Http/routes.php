<?php

/**
 * 配件管理
 */

use Celaraze\Chemex\Part\Http\Controllers\PartCategoryController;
use Celaraze\Chemex\Part\Http\Controllers\PartRecordController;
use Celaraze\Chemex\Part\Http\Controllers\PartTrackController;
use Illuminate\Support\Facades\Route;

Route::resource('/part/records', PartRecordController::class, ['names' => [
    'index' => 'part.records.index',
    'show' => 'part.records.show'
]]);
Route::resource('/part/tracks', PartTrackController::class, ['names' => [
    'index' => 'part.tracks.index',
    'show' => 'part.tracks.show'
]]);
Route::resource('/part/categories', PartCategoryController::class, ['names' => [
    'index' => 'part.categories.index',
    'show' => 'part.categories.show'
]]);
