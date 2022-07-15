<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable= ['title', 'value'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
