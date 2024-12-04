<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthController;

Route::controller(AuthController::class)
    ->prefix('login')
    ->middleware('guest')
    ->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/', 'authenticate')->name('authenticate');
    });

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
