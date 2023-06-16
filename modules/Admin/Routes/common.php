<?php

/*
 * salesforce-laravel | common.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 *
 * Created on : 10/24/2022 10:02 AM
*/

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Auth;
use Modules\Admin\Http\Controllers\User;

Route::group(['prefix' => 'admin'], function () {
    Route::get(
        '/login',
        [Auth\LoginController::class, 'viewLoginPage']
    )->name('admin.view.login');
    Route::post(
        '/login',
        [Auth\LoginController::class, 'login']
    )->name('admin.action.login');

    Route::get(
        '/logout',
        [Auth\LoginController::class,'logout']
    )->name('admin.action.logout');
    Route::get(
        '/reset-password',
        [Auth\LoginController::class,'resetPassword']
    )->name('admin.view.reset-password');

    Route::patch(
        '/reset-password',
        [User\UserController::class , 'resetPassword']
    )->name('admin.action.reset-password');
    Route::post(
        '/forgot-password',
        [User\UserController::class , 'sendPasswordResetEmail']
    )->name('admin.action.forgot-password');
});

