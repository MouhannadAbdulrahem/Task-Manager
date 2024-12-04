<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\User\UserController;

Route::controller(UserController::class)
    ->middleware(['auth', 'role:' . Role::ADMIN->value])
    ->prefix('users')
    ->as('users.')
    // ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{userId}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::get('/{userId}/edit', 'edit')->name('edit');
        Route::put('/{userId}', 'update')->name('update');
        Route::delete('/{userId}', 'delete')->name('delete');
    });
