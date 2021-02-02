<?php

use Celaraze\Chemex\Mirage\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('chemex-mirage', Controllers\ChemexMirageController::class.'@index');