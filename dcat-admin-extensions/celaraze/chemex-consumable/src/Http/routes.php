<?php

use Celaraze\Chemex\Consumable\Http\Controllers\ConsumableCategoryController;
use Celaraze\Chemex\Consumable\Http\Controllers\ConsumableRecordController;
use Celaraze\Chemex\Consumable\Http\Controllers\ConsumableTrackController;
use Illuminate\Support\Facades\Route;

/**
 * 耗材管理
 */
Route::resource('/consumable/records', ConsumableRecordController::class, ['names' => [
    'index' => 'consumable.records.index',
    'show' => 'consumable.records.show'
]]);
Route::resource('/consumable/categories', ConsumableCategoryController::class, ['names' => [
    'index' => 'consumable.categories.index',
    'show' => 'consumable.categories.show'
]]);
Route::resource('/consumable/tracks', ConsumableTrackController::class, ['names' => [
    'index' => 'consumable.tracks.index',
    'show' => 'consumable.tracks.show'
]]);
