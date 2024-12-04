<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Task\TaskController;

Route::controller(TaskController::class)
    ->middleware(['auth', 'role:' . Role::ADMIN->value])
    ->prefix('tasks')
    ->as('tasks.')
    // ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{taskId}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::get('/{taskId}/edit', 'edit')->name('edit');
        Route::put('/{taskId}', 'update')->name('update');
        Route::delete('/{taskId}', 'delete')->name('delete');
    });
