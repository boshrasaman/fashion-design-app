<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'measurements' => 'array', // لتحويل حقل المقاسات إلى مصفوفة PHP
    ];

    // العلاقة العكسية مع الزبون
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // العلاقة العكسية مع الخياطة
    public function tailor()
    {
        return $this->belongsTo(User::class, 'tailor_id');
    }

    // علاقة عروض الأسعار المرتبطة بالطلب
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}