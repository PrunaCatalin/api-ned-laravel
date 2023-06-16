<?php
/**
 * File Name: ${NAME}
 * Author: pruna
 * Created: 6/11/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/11/2023 | pruna | Initial version
 *
 */

use Modules\Admin\Http\Controllers\Dashboard\GoogleAdwordsController;
use Modules\Admin\Http\Controllers\Dashboard\GoogleAnalyticsController;

Route::middleware('auth.admin')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get(
                '/google-analytics',
                [GoogleAnalyticsController::class, 'viewStats']
            )->name("admin.view.dashboard.google-analytics");

            Route::get(
                '/google-adwords',
                [GoogleAdwordsController::class, 'viewStats']
            )->name("admin.view.dashboard.google-adwords");
        });
    });
});
