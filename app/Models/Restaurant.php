<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'name','phone_number','bank_id','user_id','address_id','starus',
    ];

    public function restaurantCategories()
    {
        return $this->belongsToMany(RestaurantCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
