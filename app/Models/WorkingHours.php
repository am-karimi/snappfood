<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingHours extends Model
{
    use HasFactory;

    protected $fillable=['restaurant_id','day','open_time','close_time'];

    public const Days =
        [
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday'
        ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
