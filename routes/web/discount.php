<?php


use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/discounts/chooseRestaurant',[DiscountController::class, 'chooseRestaurant'])
        ->name('discounts.chooseRestaurant');

    Route::post('/discounts/create',[DiscountController::class,'create'])
        ->name('discounts.create');

    Route::resource('/discounts', DiscountController::class)
        ->except('create','update','show','edit');

});
