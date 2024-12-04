<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', fn() => view('welcome'));


Route::as('dashboard.')
    ->group(function () {
        require_once "Dashboard/auth.php";
        require_once "Dashboard/task.php";
        require_once "Dashboard/user.php";
    });


Route::post('set-theme', function () {
    Session::put('theme', request()->get('theme'));
    return true;
})->name('set.theme');
