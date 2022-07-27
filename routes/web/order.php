<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(callback: function () {

    Route::post('orders/filter',[OrderController::class , 'filterOrder'])->name('orders.filter');
    Route::get('orders/status/{order}',[OrderController::class , 'changeStatus'])->name('orders.status');
    Route::resource('orders', OrderController::class)->only('destroy','store','create','index');


});
