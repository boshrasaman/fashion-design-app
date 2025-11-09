<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'order_id',
        'tailor_id',
        'price',
        'notes',
        'status',
    ];

    // العلاقة العكسية مع الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // العلاقة العكسية مع الخياطة
    public function tailor()
    {
        return $this->belongsTo(User::class, 'tailor_id');
    }
}