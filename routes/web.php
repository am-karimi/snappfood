<?php

use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SellerRestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts/dashboard');
    })->name('dashboard');


    Route::post('/users/status', [UserController::class, 'status'])->name('status');
    Route::resource('/users', UserController::class);


    Route::resource('category/restaurantCategories', RestaurantCategoryController::class);
    Route::resource('category/foodCategories', FoodCategoryController::class);

    Route::post('foods/restaurantFilter', [FoodController::class,'restaurantFilter'])->name('foods.restaurantFilter');
    Route::post('foods/categoryFilter', [FoodController::class,'categoryFilter'])->name('foods.categoryFilter');


    Route::as('admin')->resource('admin/foods', AdminFoodController::class);
    Route::as('seller')->resource('seller/foods', FoodController::class);
    Route::as('admin')->resource('admin/restaurants', AdminRestaurantController::class);
    Route::as('seller')->resource('seller/restaurants', SellerRestaurantController::class);
});


