<?php

/*
 * webdirect | shop.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/16/2023 11:16 AM
*/

use Modules\FresciaStore\Http\Controllers\Shop\CartController;
use Modules\FresciaStore\Http\Controllers\Shop\ProductCategoriesController;
use modules\FresciaStore\Http\Controllers\Shop\ProductController;
use Modules\FresciaStore\Http\Controllers\Shop\ShopController;

//Normal Route
Route::group(['prefix' => 'magazin'], function () {
    //Only Ajax Request
    Route::middleware(['ajax'])->group(function () {
        Route::post('addToCart', [CartController::class, 'addToCart'])->name('cart.add');
    });
    Route::middleware(['auth.customer'])->group(function () {
    });
    Route::get('/cosul-meu', [ShopController::class, 'view'])->name('shop.cart');

    //Only Normal Request
    Route::get('/', [ShopController::class, 'view'])->name('shop.page');
    Route::post('/', [ShopController::class, 'view'])->name('shop.page.post');

    //Only with params
    //show products by category slug
    Route::get('/{slug}', [ProductCategoriesController::class, 'view'])->name('category.show');
    Route::post('/{slug}', [ProductCategoriesController::class, 'view'])->name('category.show.post');

    //show product by product slug
    Route::get('/{slug}/{product-slug}', [ProductController::class, 'showProduct'])->name('product.show');
});
