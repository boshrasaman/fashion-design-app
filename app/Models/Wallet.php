<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $guarded = []; // السماح بتعبئة جميع الحقول لتبسيط المثال

    // العلاقة العكسية مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة التعاملات المالية
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}