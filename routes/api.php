<?php

use App\Http\Controllers\Api\AddressesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register',[AuthController::class,'register'],);
Route::post('login',[AuthController::class,'login'],);

Route::middleware('auth:sanctum')->group(function(){
    # logout
    Route::post('logout',[AuthController::class,'logout'],);
    # Address PART
    Route::get('addresses',[AddressesController::class,'getAddresses']);
    Route::post('addresses',[AddressesController::class,'addAddress']);
    Route::get('addresses/{address_id}',[AddressesController::class,'setCurrent']);

    # Restaurant PART
    Route::get('restaurants/{restaurant_id}',[RestaurantsController::class,'getRestaurantInfo']);
    Route::get('restaurants',[RestaurantsController::class,'getRestaurants']);

    # Food PART
    Route::get('restaurants/{restaurant_id}/foods',[FoodController::class,'getFoods']);

    #cards
    Route::get('carts',[CartController::class,'getCarts']);
    Route::post('carts/add',[CartController::class,'addCart']);
    Route::patch('carts/add',[CartController::class,'update']);
    Route::get('carts/{cart_id}',[CartController::class,'show']);

    #Payment
    Route::post('carts/{cart}/pay',[OrderController::class , 'addCart']);

});

