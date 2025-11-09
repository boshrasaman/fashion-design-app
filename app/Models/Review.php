<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer_id',
        'tailor_id',
        'order_id',
        'rating',
        'comment',
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

    // العلاقة العكسية مع الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}