<?php
/*
 * api-ned | pages.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 8:57 AM
*/

use Modules\NedCurier\Http\Controllers\CookieController;
use Modules\NedCurier\Http\Controllers\NedCurierController;
use Modules\NedCurier\Http\Controllers\Pages\AboutCookieController;
use Modules\NedCurier\Http\Controllers\Pages\AboutUsController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ImportListAwbController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ListAwbController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ListPriceController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ListSlipController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ReceiverExternalListController;
use Modules\NedCurier\Http\Controllers\Pages\Awb\ReceiverInternalListController;
use Modules\NedCurier\Http\Controllers\Pages\AwbTrackingController;
use Modules\NedCurier\Http\Controllers\Pages\CargoDeliveryController;
use Modules\NedCurier\Http\Controllers\Pages\CompetitivePricesController;
use Modules\NedCurier\Http\Controllers\Pages\ContactController;
use Modules\NedCurier\Http\Controllers\Pages\CostEstimateController;
use Modules\NedCurier\Http\Controllers\Pages\Customer\AccountDetailsListController;
use Modules\NedCurier\Http\Controllers\Pages\Customer\ReceiverActionController;
use Modules\NedCurier\Http\Controllers\Pages\Customer\ReceiverCustomerListController;
use Modules\NedCurier\Http\Controllers\Pages\Customer\SenderActionController;
use Modules\NedCurier\Http\Controllers\Pages\Customer\SenderCustomerListController;
use Modules\NedCurier\Http\Controllers\Pages\FastDeliveryController;
use Modules\NedCurier\Http\Controllers\Pages\FirstStepsController;
use Modules\NedCurier\Http\Controllers\Pages\FrequentQuestionsController;
use Modules\NedCurier\Http\Controllers\Pages\GenerateAwbController;
use Modules\NedCurier\Http\Controllers\Pages\HomePageClientController;
use Modules\NedCurier\Http\Controllers\Pages\LoginController;
use Modules\NedCurier\Http\Controllers\Pages\LogisticsServicesController;
use Modules\NedCurier\Http\Controllers\Pages\PackingTipsController;
use Modules\NedCurier\Http\Controllers\Pages\PersonalizedServicesController;
use Modules\NedCurier\Http\Controllers\Pages\PrivacyPolicyController;
use Modules\NedCurier\Http\Controllers\Pages\ShipAndWInPrizesController;
use Modules\NedCurier\Http\Controllers\Pages\ShipmentTrackingController;
use Modules\NedCurier\Http\Controllers\Pages\SpeedAndEfficiencyController;
use Modules\NedCurier\Http\Controllers\Pages\TermsAndConditionsController;

//Common pages
Route::get('/', [NedCurierController::class, 'index'])->name('page.homepage');
//begin user login part
Route::get('/home-page-client', [HomePageClientController::class, 'index'])->name('page.home_page_client');
Route::get('/generate-awb', [GenerateAwbController::class, 'index'])->name('page.generate_awb');
Route::get('/list-awb', [ListAwbController::class, 'index'])->name('page.list_awb');
Route::post('/list-awb', [ListAwbController::class, 'index'])->name('page.post.list_awb');
Route::get('/list-slip', [ListSlipController::class, 'index'])->name('page.list_slip');
Route::get('/list-price', [ListPriceController::class, 'index'])->name('page.list_price');
Route::get('/import-list-awb', [ImportListAwbController::class, 'index'])->name('page.import_list_awb');
Route::get('/receiver-internal-list', [ReceiverInternalListController::class, 'index'])->name('page.receiver_internal_list');
Route::get('/receiver-external-list', [ReceiverExternalListController::class, 'index'])->name('page.receiver_external_list');
Route::get('/account-details', [AccountDetailsListController::class, 'index'])->name('page.account_details');
Route::get('/sender-customer-list', [SenderCustomerListController::class, 'index'])->name('page.sender_customer_list');
Route::get('/receiver-customer-list', [ReceiverCustomerListController::class, 'index'])->name('page.receiver_customer_list');
Route::get('/insert-receiver', [ReceiverActionController::class, 'create'])->name('page.insert_receiver');
Route::get('/edit-receiver', [ReceiverActionController::class, 'edit'])->name('page.edit_receiver');
Route::get('/insert-sender', [SenderActionController::class, 'create'])->name('page.insert_sender');
Route::get('/edit-sender', [SenderActionController::class, 'edit'])->name('page.edit_sender');
//Cookie
Route::middleware(['ajax'])->group(function () {
    Route::post('accept-cookies', [CookieController::class, 'acceptCookies'])->name('accept_cookies');
});
Route::get('/about-cookie', [AboutCookieController::class, 'index'])->name('page.about_cookie');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('page.privacy_policy');
//end user login part
Route::get('/about-us', [AboutUsController::class, 'index'])->name('page.about_us');
Route::get('/cost-estimate', [CostEstimateController::class, 'index'])->name('page.cost_estimate');
Route::get('/shipment-tracking', [ShipmentTrackingController::class, 'index'])->name('page.shipment_tracking');
Route::get('/frequent-questions', [FrequentQuestionsController::class, 'index'])->name('page.frequent_questions');
Route::get('/speed-and-efficiency', [SpeedAndEfficiencyController::class, 'index'])->name('page.speed_and_efficiency');
Route::get('/competitive-prices', [CompetitivePricesController::class, 'index'])->name('page.competitive_prices');
Route::get('/personalized-services', [PersonalizedServicesController::class, 'index'])->name('page.personalized_services');
Route::get('/packing-tips', [PackingTipsController::class, 'index'])->name('page.packing_tips');
Route::get('/ship-and-win-prizes', [ShipAndWInPrizesController::class, 'index'])->name('page.ship_and_win_prizes');
Route::get('/awb-tracking', [AwbTrackingController::class, 'index'])->name('page.awb_tracking');
Route::get('/login', [LoginController::class, 'index'])->name('page.login');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('page.terms_and_conditions');
Route::get('/fast-delivery', [FastDeliveryController::class, 'index'])->name('page.fast_delivery');
Route::get('/cargo-delivery', [CargoDeliveryController::class, 'index'])->name('page.cargo_delivery');
Route::get('/logistics-services', [LogisticsServicesController::class, 'index'])->name('page.logistics_services');
Route::get('/first-steps', [FirstStepsController::class, 'index'])->name('page.first_steps');
Route::middleware(['ajax'])->group(function () {

});
Route::get('/contact', [ContactController::class, 'index'])->name('page.contact');
