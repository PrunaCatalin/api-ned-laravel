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
use Modules\NedCurier\Http\Controllers\Pages\AwbTrackingController;
use Modules\NedCurier\Http\Controllers\Pages\CompetitivePricesController;
use Modules\NedCurier\Http\Controllers\Pages\ContactController;
use Modules\NedCurier\Http\Controllers\Pages\CostEstimateController;
use Modules\NedCurier\Http\Controllers\Pages\FrequentQuestionsController;
use Modules\NedCurier\Http\Controllers\Pages\LoginController;
use Modules\NedCurier\Http\Controllers\Pages\PackingTipsController;
use Modules\NedCurier\Http\Controllers\Pages\PersonalizedServicesController;
use Modules\NedCurier\Http\Controllers\Pages\ShipAndWInPrizesController;
use Modules\NedCurier\Http\Controllers\Pages\ShipmentTrackingController;
use Modules\NedCurier\Http\Controllers\Pages\SpeedAndEfficiencyController;

//Common pages
Route::get('/', [NedCurierController::class , 'index'])->name('page.homepage');
Route::get('/about-us', [AboutUsController::class , 'index'])->name('page.about_us');
Route::get('/cost-estimate', [CostEstimateController::class , 'index'])->name('page.cost_estimate');
Route::get('/shipment-tracking', [ShipmentTrackingController::class , 'index'])->name('page.shipment_tracking');
Route::get('/frequent-questions', [FrequentQuestionsController::class , 'index'])->name('page.frequent_questions');
Route::get('/speed-and-efficiency', [SpeedAndEfficiencyController::class , 'index'])->name('page.speed_and_efficiency');
Route::get('/competitive-prices', [CompetitivePricesController::class , 'index'])->name('page.competitive_prices');
Route::get('/personalized-services', [PersonalizedServicesController::class , 'index'])->name('page.personalized_services');
Route::get('/packing-tips', [PackingTipsController::class , 'index'])->name('page.packing_tips');
Route::get('/ship-and-win-prizes', [ShipAndWInPrizesController::class , 'index'])->name('page.ship_and_win_prizes');
Route::get('/awb-tracking', [AwbTrackingController::class , 'index'])->name('page.awb_tracking');
Route::get('/login', [LoginController::class , 'index'])->name('page.login');
Route::middleware(['ajax'])->group(function () {

});
Route::get('/contact', [ContactController::class , 'index'])->name('page.contact');
