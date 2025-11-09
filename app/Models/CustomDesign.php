<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomDesign extends Model
{
    protected $fillable = [
        'customer_id',
        'top_dress_part',
        'bottom_dress_part',
        'fabric_type',
        'fabric_color',
        'additional_images',
        'notes',
        'final_image_path',
    ];

    protected $casts = [
        'additional_images' => 'array',
    ];

    // العلاقة العكسية مع الزبون
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // علاقة عناصر الطلبات (إذا تم طلب هذا التصميم المخصص)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}