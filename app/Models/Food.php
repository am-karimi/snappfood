<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['name','price','raw_material','food_category_id','discount_id','old_price'];

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
