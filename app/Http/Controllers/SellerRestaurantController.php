<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerRestaurantController extends Controller
{
    public function index()
    {
        return view('restaurants.seller.index');
    }
}
