<?php
/**
 * File Name: ${NAME}
 * Author: pruna
 * Created: 6/10/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/10/2023 | pruna | Initial version
 *
 */

use Modules\Admin\Http\Controllers\Account\AccountController;

Route::middleware('auth.admin')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/account/settings', [
            AccountController::class , 'account'
        ])->name("admin.view.account.settings");

        Route::patch('/account/settings', [
            AccountController::class , 'savePersonalInformation'
        ])->name("admin.action.account.settings");
    });
});
