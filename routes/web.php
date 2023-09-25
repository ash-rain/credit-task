<?php

use App\Http\Controllers\CreditController;
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