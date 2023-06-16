<?php
/*
 * webdirect | pages.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/16/2023 9:14 AM
*/
use Modules\FresciaStore\Http\Controllers\ContactController;
use Modules\FresciaStore\Http\Controllers\CookieController;

Route::get('/', 'FresciaStoreController@index')->name("home.page");
Route::get('revista', 'FresciaStoreController@index')->name("magazine.page");
Route::get('gift-card', 'FresciaStoreController@index')->name("gift-card.page");

Route::get('contact', [ContactController::Class, 'view'])->name("contact.page");
Route::post('contact', [ContactController::Class, 'send'])->name("contact.page-submit");

Route::get('politica-cookie', [ContactController::Class, 'send'])->name("page.cookie_policy");

Route::middleware(['ajax'])->group(function () {
    Route::post('accept-cookies', [CookieController::class, 'acceptCookies'])->name('accept_cookies');
});
