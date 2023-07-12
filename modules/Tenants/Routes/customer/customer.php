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
});
