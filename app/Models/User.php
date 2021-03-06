<?php

namespace App\Models;

use Cassandra\Exception\ReadTimeoutException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'avatar',
        'status',
        'email',
        'password',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class,'addressable');
    }

    public function currentAddress()
    {
        return $this->hasOne(Address::class,'id','address_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
