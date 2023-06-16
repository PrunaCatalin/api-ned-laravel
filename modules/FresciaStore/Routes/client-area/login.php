<?php
/*
 * webdirect | login.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/12/2023 9:38 PM
*/

use Modules\FresciaStore\Http\Controllers\Auth\CustomerAuthController;

Route::group(['prefix' => 'zona-client'], function () {
    Route::post('login', [CustomerAuthController::class, 'login'])->name('customer.action.login');
    Route::get('login', [CustomerAuthController::class, 'view'])->name('customer.view.login');
    Route::get('logout', [CustomerAuthController::class, 'logout'])->name('customer.action.logout');

//    Route::middleware(['auth.customer'])->group(function () {
//        Route::get('/', function () {
//            echo "Passed with AUTH";
//        })->name("customer.dashboard");
//    });
});
