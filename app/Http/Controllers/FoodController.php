<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Food::class , 'food');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # where user is admin
        if (Auth::user()->hasRole([1,2])){
            $foods=Food::paginate(5);
            $restaurants = Restaurant::all();
        }
        # where user is seller
        else
        {
            $foods=Food::whereHas('restaurants',function ($query){
                $query->where('user_id',Auth::id());
            })->paginate(5);
            $restaurants = Restaurant::with('user')->where('user_id', Auth::id())->get();
        }
        $foodCategories = FoodCategory::all();

        return view('foods.index', compact('foods', 'foodCategories', 'restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $restaurants = Restaurant::with('user')->where('user_id', $user->id)->get();
        $foodCategories = FoodCategory::with('foods')->get();
        return view('foods.create', compact('foodCategories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFoodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $food = Food::create($request->all());
//        foreach ($request->food_category_id as $category_id) {
//            $food = Food::create(
//                [
//                    'name' => $request->name,
//                    'price' => $request->price,
//                    'raw_material' => $request->raw_material,
//                    'food_category_id' => $category_id
//                ]
//            );
//        }
        $food->restaurants()->sync(
            [
                'restaurant_id' => $request->restaurant_category_id,
            ],
        );
        return redirect()->route('foods.index')->with('success', 'New Food Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $user = Auth::user();
//        $restaurants = Restaurant::with('user')->where('user_id', $user->id)->get();
        $restaurants = Restaurant::where('user_id', $user->id)->get();
        $foodCategories = FoodCategory::with('foods')->get();

        return view('foods.edit', compact('food', 'foodCategories', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFoodRequest $request
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->update($request->all());
        return redirect()->route('foods.index')->with('success', 'Update Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back()->with('delete', 'Delete Successfull');
    }

    public function restaurantFilter(Request $request)
    {
        $foods=Food::whereHas('restaurants',function ($query) use ($request){
            $query->where('restaurant_id',$request->restaurant_category_id);
        })->paginate(3);

        $restaurants = Restaurant::with('user')->where('user_id', Auth::id())->get();
        return view('foods.index', compact('foods','restaurants'));
    }

    public function categoryFilter(Request $request)
    {
        $foods=Food::where('food_category_id',$request->food_category_id)->paginate(3);
        $foodCategories=FoodCategory::all();
        return view('foods.index', compact('foods','foodCategories'));
    }
}
