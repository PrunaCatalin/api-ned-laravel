<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;

Route::get('clear-cache', function () {
//    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    cache()->flush();
    return "Cache is cleared";
});

//Route::get('clear-route-cache', function () {
//
//    return "Route Cache is cleared";
//});
//
//Route::get('clear-view-cache', function () {
//
//    return "View Cache is cleared";
//});
//Route::get('import-products', function () {
//    Artisan::call('import:frescia');
//    return "Import successfuly";
//});
//Route::fallback(function () {
//    abort(404, 'API resource not found');
//});
