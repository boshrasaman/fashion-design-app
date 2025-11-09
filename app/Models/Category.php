<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // العلاقة الأبوية (التصنيف الأم)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // العلاقة البنوية (التصنيفات الفرعية)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // علاقة المنتجات الجاهزة
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}