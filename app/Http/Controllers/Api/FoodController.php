<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function getFoods($restaurant_id)
    {
        $foods=Food::whereHas('restaurants',function ($query) use ($restaurant_id){
            $query->where('restaurant_id',$restaurant_id);
        })->get();
        return response()->json(
            [
                'Foods' => $foods,
            ]
        );
    }
}
