<?php


use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\RestaurantCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::resource('category/restaurantCategories', RestaurantCategoryController::class);

    Route::resource('category/foodCategories', FoodCategoryController::class);

});
