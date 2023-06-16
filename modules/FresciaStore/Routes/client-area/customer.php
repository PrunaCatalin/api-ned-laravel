<?php
Route::group(['prefix' => 'zona-client'], function () {
    Route::middleware(['auth.customer'])->group(function () {
        Route::get('/', function () {
            echo "Passed with AUTH 2";
        })->name("customer.view.dashboard");
        Route::get('/setari-cont', function () {
            echo "Passed with AUTH 2";
        })->name("customer.view.settings");
        Route::get('/profil', function () {
            echo "Passed with AUTH 2";
        })->name("customer.view.profile");
        Route::get('/comenzii', function () {
            echo "Passed with AUTH 2";
        })->name("customer.view.orders");
    });
});
