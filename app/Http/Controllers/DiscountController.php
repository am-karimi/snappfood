<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::paginate(5);
        return view('discounts.index', compact('discounts'));
    }

    /**
     *Choose Restaurant Before Create Discount
     */
    public function chooseRestaurant()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        return view('discounts.preCreate', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant_id = request('restaurant_id');
        $foods = Food::whereHas('restaurants', function ($query) use ($restaurant_id) {
            $query->where('restaurant_id', $restaurant_id);
        })->get();
        return view('discounts.create', compact('foods'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreDiscountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountRequest $request)
    {
        $discount = Discount::create(
            [
                'title' => $request->title,
                'value' => $request->value
            ]
        );
        $food = Food::find($request->food_id);
        $food->update(['discount_id' => $discount->id]);
        #  change price after apply discount
        $food->update(['old_price' =>$food->price]);
        $food->update(['price' =>$food->price-(($request->value/100)*$food->price)]);

        return redirect()->route('discounts.index')->with('success', 'discount added');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDiscountRequest $request
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $food=Food::where('discount_id',$discount->id)->first();
        $food->update(['price' =>$food->old_price,'old_price'=>null,'discount_id'=>0]);
        $discount->delete();
        return redirect()->route('discounts.index')->with('message','Discount Delete');

    }
}
