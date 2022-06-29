<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use App\Http\Requests\StoreRestaurantCategoryRequest;
use App\Http\Requests\UpdateRestaurantCategoryRequest;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resCategories=RestaurantCategory::paginate(5);
        return view('category.restaurant.index',compact('resCategories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantCategoryRequest $request)
    {
        RestaurantCategory::create($request->all());
        return redirect()->route('restaurantCategories.index')->with('success','New Restaurant Category added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantCategory $restaurantCategory)
    {
        return view('category.restaurant.edit',compact('restaurantCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantCategoryRequest  $request
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantCategoryRequest $request, RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->update($request->all());
        return redirect()->route('restaurantCategories.index')
            ->with('success',' Restaurant Category Updated');
    }


    public function destroy(RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->delete();
        return redirect()->route('restaurantCategories.index')
            ->with('success','Restaurant Category Deleted');
    }
}
