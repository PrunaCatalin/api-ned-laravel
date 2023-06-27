<?php
/**
 * File Name: auth.php
 * Author: CATALIN PRUNA
 * Created: 6/17/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/17/2023 | CATALIN PRUNA | Initial version
 *
 */

use Modules\Tenants\Http\Controllers\TenantsController;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        //names are mandatory
        Route::post('login', [TenantsController::class, 'view'])->name('api.customer.login');
    });
});
