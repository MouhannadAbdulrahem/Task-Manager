<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthController;

Route::controller(AuthController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
    });

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
