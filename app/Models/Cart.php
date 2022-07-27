<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['restaurant_id','user_id','total_price','shipping_cost','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function totalPrice(Cart $cart)
    {
        $cartItems = $cart->cartItems->load('food');
#       Option One
        $totalPrice = 0;
        $cartItems->each(function ($cartItem) use (&$totalPrice) {
            $totalPrice += $cartItem->total_price;
        });
#         Option two
//        $total=0;
//        foreach ($cartItems as $cartItem){
//            $total += $cartItem->total_price;
//        }

        return $totalPrice;
    }

}


