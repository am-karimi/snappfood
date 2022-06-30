<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
      'name','price','raw_material','food_category_id'
    ];

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }
}
