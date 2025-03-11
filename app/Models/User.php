<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'description',
        // 'avatar',
        // 'provider_id',
        // 'provider',
        // 'access_token',
        // 'role_id',
        // 'payment_status',
        // 'payment_type',
        // 'private_address',
        // 'house_number',
        // 'zip_code',
        // 'city',
        // 'country',
        // 'phone_number',
        // 'mobile_number',
        // 'user_type',
        // 'profile_image',
        // 'device_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = ['encoded_id'];


    // protected $with = ['orders'];


    public function orders() : HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
