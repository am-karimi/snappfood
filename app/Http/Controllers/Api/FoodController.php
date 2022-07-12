<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoriesResource;
use App\Models\FoodCategory;

class FoodController extends Controller
{
    public function getFoods($restaurant_id)
    {
        /*
                  get food with restaurant - worst way
        //        $foods=Food::whereHas('restaurants',function ($query) use ($restaurant_id){
        //            $query->where('restaurant_id',$restaurant_id);
        //        })->get();
        */

#       get categories with foods - good way
        $categories=FoodCategory::with('foods')->get();
#       send data for api by api resource
        return response()->json(FoodCategoriesResource::collection($categories));
    }
}
