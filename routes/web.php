<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'create']);

Route::resource('listing', ListingController::class)
    ->only(['index', 'show']);