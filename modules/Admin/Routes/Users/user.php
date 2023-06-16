<?php

/*
 * salesforce-laravel | user.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/24/2022 10:11 AM
*/

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Modules\Admin\Http\Controllers\User;

Route::group([
    'middleware' => ['cors', 'json.response' , 'prefix' => 'api' , 'json.force', 'checkRole:Administrator'],
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
], function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('administration')->group(function () {
            Route::prefix('user')->group(function () {
                Route::post('/user-list', [User\UserController::class ,'userList'])
                    ->name('user.user-list');
                Route::post('/isAuthenticated', [User\UserController::class ,"isAuthenticated"])
                    ->name("user.isAuth");
            });
            //Account Details
            Route::prefix('/account')->group(function () {
                Route::get('/userDetails', [User\UserController::class, 'userDetails'])
                    ->name('account.account_details');
                Route::patch('/saveUserDetails', [User\UserController::class, 'saveUserDetails'])
                    ->name('account.account_save_details');
            });
        });
    });
});

