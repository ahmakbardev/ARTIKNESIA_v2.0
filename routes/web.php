<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/cart-detail', 'cartDetail')->name('cart-detail');

    Route::prefix('/checkout')->group(function () {
        Route::get('/', 'checkout')->name('checkout');
        Route::post('/', 'checkoutProcess')->name('checkout-process');
    });

    Route::prefix('/payment')->group(function () {
        Route::get('/', 'payment')->name('payment');
        Route::post('/', 'paymentProcess')->name('payment-process');
    });

    Route::get('/{art}', 'art')->name('art');
});

