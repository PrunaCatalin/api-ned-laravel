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
        Route::group(['prefix' => 'apps'], function () {
            Route::get(
                '/google-analytics-websites',
                [GoogleAnalyticsController::class, 'viewWebsites']
            )->name("admin.view.apps.google-analytics-websites");
            Route::get(
                '/google-analytics-reports',
                [GoogleAnalyticsController::class, 'viewReports']
            )->name("admin.view.apps.google-analytics-reports");

            Route::get(
                '/google-adwords-campaigns',
                [GoogleAdwordsController::class, 'viewCampaigns']
            )->name("admin.view.app.google-adwords-campaigns");
            Route::get(
                '/google-adwords-reports',
                [GoogleAdwordsController::class, 'viewReports']
            )->name("admin.view.app.google-adwords-reports");
        });
    });
});
