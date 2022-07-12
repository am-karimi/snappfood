<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'name','slug','restaurant_category_id',
    ];

    public function restaurantCategory()
    {
        return   $this->belongsTo(RestaurantCategory::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }



}
