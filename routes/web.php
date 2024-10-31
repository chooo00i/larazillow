<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return inertia('Index/Index');
});

Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');