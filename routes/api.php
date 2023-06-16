<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::group([
//    'middleware' => ['cors', 'json.response' , 'prefix' => 'api' , 'json.force'],
//    InitializeTenancyByDomain::class,
//    PreventAccessFromCentralDomains::class,
//], function () {
//    Route::prefix('v1')->group(function () {
//        //Slack Options - work in progress
//        Route::post('/slack/jobs', function () {
//            // Artisan::call('importPlayers:TEST');
//        });
////        Route::post('/check_permission_route', 'Auth\PermissionsRouteController@checkPermissionRoute')
////            ->name('auth.checkPermission');
//
//    });
//});
//Route::fallback(function () {
//    abort(404, 'API resource not found');
//});
