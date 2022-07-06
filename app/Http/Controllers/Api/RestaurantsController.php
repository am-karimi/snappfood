<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function getRestaurantInfo($restaurant_id)
    {
        $restaurant=Restaurant::with('user')->where('id',$restaurant_id)->first();
        return response()->json(
            [
                'restaurant' => $restaurant,
            ]
        );
    }

    public function getRestaurants()
    {
        $restaurants=Restaurant::all();
        return response()->json(
            [
                'restaurants' => $restaurants,
            ]
        );
    }
}
