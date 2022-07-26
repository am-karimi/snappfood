<?php


use App\Http\Controllers\SellerRestaurantController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('seller/restaurants/{restaurant_id}/setLocation',[SellerRestaurantController::class ,'setLocation'])->name('setLocation');

    Route::post('seller/restaurants/storeLocation',[SellerRestaurantController::class ,'storeLocation'])->name('seller.restaurant.storeLocation');

    Route::as('seller')->resource('seller/restaurants', SellerRestaurantController::class);

});
