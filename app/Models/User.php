<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role', // تم إضافة Role
        'profile_picture',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // علاقة المحفظة
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    
    // علاقة التصاميم الخاصة بالمصمم
    public function designs()
    {
        return $this->hasMany(Design::class, 'designer_id');
    }
}

