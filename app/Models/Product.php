<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'design_id',
        'tailor_id',
        'category_id',
        'name',
        'price',
        'description',
        'image',
        'stock',
    ];

    // العلاقة العكسية مع التصميم
    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    // العلاقة العكسية مع الخياطة
    public function tailor()
    {
        return $this->belongsTo(User::class, 'tailor_id');
    }

    // العلاقة العكسية مع التصنيف
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}