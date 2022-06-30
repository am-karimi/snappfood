<?php

use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantCategoryController;
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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts/dashboard');
    })->name('dashboard');
});

Route::post('/users/status',[UserController::class,'status'])->name('status');
Route::resource('/users', UserController::class);

//Route::resource('category/restaurantCategories', RestaurantCategoryController::class);

Route::resource('category/restaurantCategories',RestaurantCategoryController::class);
Route::resource('category/foodCategories', FoodCategoryController::class);
Route::resource('foods', FoodController::class);
