<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['url'];
    # relation to user and restaurant automatic -> find by imageable type
    public function imageable()
    {
        return $this->morphTo();
    }
}
