<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    public function index()
    {
        $restaurants=Restaurant::with('user','address','restaurantCategories')->paginate(5);
        return view('restaurants.admin.index',compact($restaurants));
    }


}
