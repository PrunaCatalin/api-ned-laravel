<?php

/*
 * API NED CURIER | common.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/24/2022 10:02 AM
*/

use App\Models\Users\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

//Route::group([
//    'middleware' => ['cors', 'json.response' , 'prefix' => 'api' , 'json.force'],
//    InitializeTenancyByDomain::class,
//    PreventAccessFromCentralDomains::class,
//], function () {
//    Route::prefix('v1')->group(function () {
//        Route::prefix('auth')->group(function () {
//            Route::post('/login', ['uses' => 'Auth\LoginController@login'])->name('login.api');
//            Route::post('/logout', 'Auth\LoginController@logout')->name('logout.api');
//            Route::patch('/reset-password', ['uses' => 'User\UserController@resetPassword'])
//                ->name('login.resetPassword');
//            Route::post('/forgot-password', ['uses' => 'User\ForgotPasswordController@sendPasswordResetEmail'])
//                ->name('login.forgotPassword');
//        });
//    });
//});
