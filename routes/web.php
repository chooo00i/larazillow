<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\UserAccountController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'create'])
    ->middleware('auth');
    // middleware는 컨트롤러 전에 작동

Route::resource('listing', ListingController::class)
    ->only(['index', 'show']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);

Route::prefix('realtor')
    ->name('realtor.') // 시작 이름 지정
    ->middleware('auth') // 권한이 있는 사용자만 접근
    ->group(function () {
        Route::name('listing.restore')
            ->put(
                'listing/{listing}/restore',
                [RealtorListingController::class, 'restore']
            )->withTrashed();
        Route::resource('listing', RealtorListingController::class)
            ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
            ->withTrashed(); // softdeleted 된 데이터도 포함
    });