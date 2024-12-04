<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;


Route::controller(AuthController::class)
    ->middleware('guest:sanctum')
    ->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });
