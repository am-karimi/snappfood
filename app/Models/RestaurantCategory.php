<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name', 'slug'
    ];

    public function foodCategories()
    {
        return $this->hasMany(FoodCategory::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

}
