<?php

/*
 * API NED CURIER | route.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/31/2022 3:37 PM
*/
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::group([
    'middleware' => ['cors', 'json.response' , 'prefix' => 'api' , 'json.force'],
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
], function () {
    Route::prefix('v1')->group(function () {
//        Route::prefix('tunnel')->group(function () {
//            Route::get(
//                '/stream',
//                [App\Http\Controllers\Stream\StreamController::class, 'streamData']
//            )->name('stream.sync.data');
//        });
    });
});
