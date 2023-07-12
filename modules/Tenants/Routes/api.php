<?php

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
Route::get('test-auth', function () {
    return response()->json([
        'status' => true,
        'message' =>"Login Success"
    ]);
})->name("tenants.test_auth");
//Route::middleware(['auth:api'])->group(function (Request $request) {
//    Route::get('/', function () {
//        echo "Passed with AUTH 2";
//    })->name("tenants.view.dashboard");
//});
