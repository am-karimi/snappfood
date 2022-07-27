<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addCart(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('id', $request->cart_id)
            ->first();
        if (!$cart) {
            return response()->json([
                'message' => 'Cart Not Found'
            ], 404);
        }
        $totalPrice = $cart->totalPrice($cart);
        DB::transaction(function () use ($cart, $totalPrice) {
#             after migrate:refresh uncomment this
//            $cart->is_pay='true';
//            $cart->save();
            if (Auth::id() == $cart->user_id) {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'cart_id' => $cart->id,
                    'address_id' => \auth()->user()->address_id,
                    'restaurant_id'=>$cart->restaurant_id,
                    'total_price' => $totalPrice,
                    'payment'=>true,
                    'status' => 'pending'
                ]);
            }

//            if ($order->payment==1){
//                $order=new Order();
//
//            }
        });

        // make payment
        return response()->json(
            [
                'message' => 'Cart Payed',
                'totalPrice' => $totalPrice
            ], 200
        );
    }
}
