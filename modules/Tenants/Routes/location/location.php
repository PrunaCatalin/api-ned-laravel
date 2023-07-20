<?php
/**
 * File Name: location.php
 * Author: CATALIN PRUNA
 * Created: 7/11/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 7/11/2023 | CATALIN PRUNA | Initial version
 *
 */
use Modules\Tenants\Http\Controllers\Location\LocationController;

Route::group(['prefix' => 'location'], function(){
    Route::post('get-counties' , [LocationController::class , 'getCounties'])->name('location.get.counties');
    Route::post('get-cities' , [LocationController::class , 'getCities'])->name('location.get.cities');
});
