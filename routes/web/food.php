<?php


use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::post('foods/restaurantFilter', [FoodController::class,'restaurantFilter'])
        ->name('foods.restaurantFilter');

    Route::post('foods/categoryFilter', [FoodController::class,'categoryFilter'])
        ->name('foods.categoryFilter');


    Route::resource('foods', FoodController::class);

});
