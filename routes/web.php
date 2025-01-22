<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authenticate')->name('authenticate');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');

    Route::get('/cart-detail', 'cartDetail')->name('cart-detail');

    Route::prefix('/checkout')->group(function () {
        Route::get('/', 'checkout')->name('checkout')->middleware('auth');
    });

    Route::prefix('/transaction')->group(function () {
        Route::get('/', 'transaction')->name('transaction')->middleware('auth');
        Route::get('/{order}', 'transactionDetail')->name('transaction-detail')->middleware('auth');
    });

    Route::get('/art', 'artList')->name('art-list');
    Route::get('/art/{art}', 'art')->name('art');

    Route::get('/coming-soon', 'comingSoon')->name('coming-soon');

});

Route::resource('article', ArticleController::class)->only('index', 'show');
Route::resource('pameran', ExhibitionController::class)->only('index', 'show')
    ->names('exhibition')
    ->parameter('pameran', 'exhibition');


Route::get('oauth/google', [\App\Http\Controllers\OAuthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OAuthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
