<?php
/*
 * api-ned | awb.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/12/2023 9:57 AM
*/


use Modules\Tenants\Http\Controllers\Awb\AwbController;

Route::group(['prefix' => 'awb'], function(){
    Route::get('awb-list' , [AwbController::class , 'getAwbList'])->name('awb.get_awb_list');
    Route::post('awb-list' , [AwbController::class , 'getAwbList'])->name('awb.post_awb_list');
    //begin awb traking
    Route::get('awb-tracking' , [AwbController::class , 'getAwb'])->name('awb.get_awb_tracking');
    Route::post('awb-tracking' , [AwbController::class , 'getAwb'])->name('awb.post_awb_tracking');
});

