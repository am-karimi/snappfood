<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class AdminRestaurantController extends Controller
{
    public function index()
    {
        $restaurants=Restaurant::with('user','address','restaurantCategories')->paginate(5);
        return view('restaurants.admin.index',compact('restaurants'));
    }

    public function show(Restaurant $restaurant)
    {
        $owner=$restaurant->user;
        $address=$restaurant->address;
        return view('restaurants.admin.showOwner',compact('owner'));
    }


}
