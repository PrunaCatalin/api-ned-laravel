<?php
/*
 * api-ned | common.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/16/2023 4:21 PM
*/
use Illuminate\Support\Facades\Route;
use Modules\Tenants\Http\Controllers\Auth\TenantAuthController;

Route::get('test', function () {
    return response()->json(['gara']);
})->name("tenants.test");



//Route::group(['prefix' => 'v1'], function () {
//    Route::group(['prefix' => 'auth'], function () {
//        Route::post('login', [Auth\LoginController::class , 'login'])->name('login.api');
//        Route::post('/logout', 'Auth\LoginController@logout')->name('logout.api');
//        Route::patch('/reset-password', ['uses' => 'User\UserController@resetPassword'])
//            ->name('login.resetPassword');
//        Route::post('/forgot-password', ['uses' => 'User\ForgotPasswordController@sendPasswordResetEmail'])
//            ->name('login.forgotPassword');
//    });
//});
