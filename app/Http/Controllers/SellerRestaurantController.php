<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $restaurants=Restaurant::with('restaurantCategories')
            ->where('user_id',Auth::id())
            ->paginate(1);
        return view('restaurants.seller.index',compact('restaurants'));
    }


    public function show(Restaurant $restaurant)
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        $restaurantCategories=RestaurantCategory::all();
        return view('restaurants.seller.create',compact('restaurantCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        //    add user_id to request
        $request->request->add(['user_id'=>Auth::id()]);
        $restaurant=Restaurant::create($request->all());

        $restaurant->address()->create([        //store address table
            'address'=>$request->address,
//            'point'=>'',
        ]);
        $restaurant->restaurantCategories()->sync($request->restaurant_category_id);
        return redirect()->route('seller.restaurants.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        // get old address for restaurant edit
        $address=Address::where('addressable_id',$restaurant->id)->first();
        $restaurantCategories=RestaurantCategory::all();
        return view('restaurants.seller.edit',compact('restaurant',
            'address','restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $request->request->add(['user_id'=>Auth::id()]);
        $restaurant=Restaurant::create($request->all());

        $restaurant->adress()->create([
            'address'=>$request->address,
//            'piont'=>''
        ]);

        $restaurant->restaurantCategories()->sync($request->restaurant_category_id);
        return redirect()->route('seller.restaurants.index')->with('success','edit updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('seller.restaurants.index');
    }

}
