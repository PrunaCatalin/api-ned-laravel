<?php
/*
 * api-ned | pages.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 8:57 AM
*/

use Modules\NedCurier\Http\Controllers\NedCurierController;
use Modules\NedCurier\Http\Controllers\Pages\AboutUsController;
use Modules\NedCurier\Http\Controllers\Pages\ContactController;
use Modules\NedCurier\Http\Controllers\Pages\CostEstimateController;
use Modules\NedCurier\Http\Controllers\Pages\FrequentQuestionsController;
use Modules\NedCurier\Http\Controllers\Pages\ShipmentTrackingController;

//Common pages
Route::get('/', [NedCurierController::class , 'index'])->name('page.homepage');
Route::get('/about-us', [AboutUsController::class , 'index'])->name('page.about_us');
Route::get('/cost-estimate', [CostEstimateController::class , 'index'])->name('page.cost_estimate');
Route::get('/shipment-tracking', [ShipmentTrackingController::class , 'index'])->name('page.shipment_tracking');
Route::get('/frequent-questions', [FrequentQuestionsController::class , 'index'])->name('page.frequent_questions');
Route::middleware(['ajax'])->group(function () {

});
Route::get('/contact', [ContactController::class , 'index'])->name('page.contact');
