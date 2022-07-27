<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\SingleCartResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Rest;


class CartController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * add cart and cart item
     */
    public function addCart(Request $request)
    {
        if (!auth()->user()->hasRole('user')) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 404);
        }
        $food = Food::find($request->food_id);
        #find restaurant for food
        $restaurant = ($food->restaurant()->orderBy('pivot_created_at', 'desc')->first());
        #set price for food after discount is active
        $price = ($food->discount_id != null) ? ($food->price - (($food->price * $food->discount->value) / 100)) : $food->price;


        $cart = Cart::firstOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'restaurant_id' => $restaurant->id,
                'user_id' => auth()->id(),
                'status' => 'preparing',
                'total_price' => 0
            ]
        );
        if ($restaurant->id !== $cart->restaurant_id) {
            return response()->json(
                [
                    'msg' => "You are not allowed to add another restaurant's food in this card",
                ], 403
            );
        }

        CartItem::updateOrCreate(
            [
                'food_id' => $request->food_id,
            ],
            [
                'food_id' => $request->food_id,
                'cart_id' => $cart->id,
                'quantity' => $request->count,
                'price' => $price,
                'total_price' => $price * $request->count,
            ]
        );

        return response()->json(
            [
                'msg' => 'food added to cart successfully',
                'cart_id' => $cart->id
            ]
        );
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * get all of carts
     */
    public function getCarts()
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'please Login'
            ], 404);
        }
        $cart = Cart::where('user_id', auth()->id())->first();
#       eager load
#       Cart::with('cartItems','restaurant')    ;
        #lazy load
        $carts = $cart->load('cartItems', 'restaurant');

        return response()->json(['carts' => new RestaurantResource($carts), 200]);
    }



    /**
     * @param Request $request
     * update quantity for cart item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 404);
        }
        $cartItem = CartItem::where('food_id', $request->food_id)->whereHas('cart', function ($query) {
            $query->where('user_id', auth()->id());
        })->first();
        $cartItem->update([
            'quantity' => $request->count
        ]);

        return response()->json(['message' => 'Cart Updated'], 200);
    }




    /**
     * @param $cart_id
     * show cart filter by cart_id
     */
    public function show($cart_id)
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 404);
        }
        $cart = Cart::with('cartItems', 'restaurant')->where('id', $cart_id)->first();

        return response()->json(
            [
                'carts' =>
                    [
                        new SingleCartResource($cart)
                    ], 200
            ]
        );
    }
}
