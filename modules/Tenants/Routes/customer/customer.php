<?php
/**
 * File Name: customer.php
 * Author: CATALIN PRUNA
 * Created: 7/9/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 7/9/2023 | CATALIN PRUNA | Initial version
 *
 */

use Modules\Tenants\Http\Controllers\Customer\CustomerController;

Route::group(['prefix' => 'customer'], function(){
    Route::get('account-details' , [CustomerController::class , 'getDetails'])->name('customer.account.details');
    //sender
    Route::get('sender-customer-list' , [CustomerController::class , 'getSenderList'])->name('customer.get_sender_list');
    Route::post('sender-customer-list' , [CustomerController::class , 'getSenderList'])->name('customer.post_sender_list');

    Route::get('sender-customer' , [CustomerController::class , 'Sender'])->name('customer.get_sender_customer');
    Route::post('sender-customer' , [CustomerController::class , 'Sender'])->name('customer.post_sender_customer');

    //receiver
    Route::get('receiver-customer-list' , [CustomerController::class , 'getReceiverList'])->name('customer.get_receiver_list');
    Route::post('receiver-customer-list' , [CustomerController::class , 'getReceiverList'])->name('customer.post_receiver_list');

    Route::get('receiver-customer' , [CustomerController::class , 'Receiver'])->name('customer.get_receiver_customer');
    Route::post('receiver-customer' , [CustomerController::class , 'Receiver'])->name('customer.post_receiver_customer');

    //price
    Route::get('price-customer-list' , [CustomerController::class , 'getPriceList'])->name('customer.get_price_list');
    Route::post('price-customer-list' , [CustomerController::class , 'getPriceList'])->name('customer.post_price_list');
});
