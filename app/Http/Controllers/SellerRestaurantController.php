<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SellerRestaurantController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Restaurant::class, 'restaurant');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $restaurants = Restaurant::with('restaurantCategories')
            ->where('user_id', Auth::id())
            ->paginate(1);

        return view('restaurants.seller.index', compact('restaurants'));
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
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurants.seller.create', compact('restaurantCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $file = $request->file('image');
        $fileName = str_replace(' ', '', $request->name) . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

        DB::beginTransaction();
        try {
            #type 1 storage
            $path = $file->storeAs('images/restaurants', $fileName);
            #type 2 storage
//        $path = Storage::putFileAs('images', $request->image, $fileName);

            $request->request->add(['user_id' => Auth::id()]);
            $restaurant = Restaurant::create($request->all());

            $restaurant->address()->create([        //store address table
                'address' => $request->address,
                'title' => $request->name,
//            'point'=>'',
            ]);
            $restaurant->image()->create(['url' => $path]);
            $restaurant->restaurantCategories()->sync($request->restaurant_category_id);
            DB::commit();
            return redirect()->route('seller.restaurants.index');
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        // get old address for restaurant edit
        $address = Address::where('addressable_id', $restaurant->id)->first();
        $restaurantCategories = RestaurantCategory::all();
        return view('restaurants.seller.edit', compact('restaurant',
            'address', 'restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $request->request->add(['user_id' => Auth::id()]);
        $restaurant->update($request->all());
        $restaurant->address->update([
            'address' => $request->address,
            'title' => $request->name,
        ]);

        $restaurant->restaurantCategories()->sync($request->restaurant_category_id);
        return redirect()->route('seller.restaurants.index')->with('success', 'edit updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('seller.restaurants.index');
    }

    public function setLocation($restaurant_id)
    {
        return view('restaurants.seller.setLocation', compact('restaurant_id'));
    }

    public function storeLocation(Request $request)
    {
        $restaurant = Restaurant::find($request->restaurant_id);
//store address table
        $restaurant->address()->update([
//            'address' => $request->address,
            'title' => $restaurant->name,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
//            'point'=> DB::raw("GeomFromText('POINT($request->lat $request->lng)')")
        ]);

        return redirect()->route('seller.restaurants.index')->with('message', 'Address Point Added');
    }

}
