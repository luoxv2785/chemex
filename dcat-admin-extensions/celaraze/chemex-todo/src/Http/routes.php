<?php

use Celaraze\Chemex\Todo\Http\Controllers\TodoRecordController;
use Illuminate\Support\Facades\Route;

Route::resource('/todo/records', TodoRecordController::class, ['names' => [
    'index' => 'todo.records.index',
    'show' => 'todo.records.show'
]]);
