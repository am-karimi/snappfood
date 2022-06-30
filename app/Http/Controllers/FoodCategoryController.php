<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;
use App\Models\RestaurantCategory;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCategories=FoodCategory::with('restaurantCategory')->paginate(5);
        $restaurantCategories=RestaurantCategory::all();
        return view('category.food.index',compact('foodCategories','restaurantCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodCategoryRequest $request)
    {
//        $request->dd();
        $foods=FoodCategory::create($request->all());
//        dd($foods);
        return redirect()->back()->with('success','New Food Category Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategory $foodCategory)
    {
        $restaurantCategories=RestaurantCategory::all();
        return view('category.food.edit',compact('foodCategory','restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodCategoryRequest  $request
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {
        $foodCategory->update($request->all());
        return redirect()->route('foodCategories.index')->with('update','update succesfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();
        return redirect()->back()->with('delete','delete succesfull');
    }

}
