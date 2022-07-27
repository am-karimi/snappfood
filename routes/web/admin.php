<?php


use App\Http\Controllers\AdminRestaurantController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {


    Route::as('admin')->resource('admin/restaurants', AdminRestaurantController::class);


});
