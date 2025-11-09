<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'design_id',
        'custom_design_id',
        'designer_share',
        'tailor_share',
        'site_share',
    ];

    // العلاقة العكسية مع الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // علاقة التصميم الجاهز (في حال كان الطلب لتصميم جاهز)
    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    // علاقة التصميم المخصص (في حال كان الطلب لتصميم مخصص)
    public function customDesign()
    {
        return $this->belongsTo(CustomDesign::class);
    }
}