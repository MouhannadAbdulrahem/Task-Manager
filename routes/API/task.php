<?php

use App\Http\Controllers\API\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)
    ->middleware('auth:sanctum')
    ->prefix('tasks')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{taskId}', 'show');
        Route::post('/', 'create');
        Route::put('/{taskId}', 'update');
        Route::delete('/{taskId}', 'delete');
    });
