<?php

use App\Http\Controllers\CreditController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::controller(CreditController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/new', 'create')->name('create_credit');
    Route::post('/new', 'store')->name('store_credit');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('/new-payment', 'create')->name('create_payment');
    Route::post('/new-payment', 'store')->name('store_payment');
});