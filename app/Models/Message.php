<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'order_id',
        'content',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // العلاقة العكسية مع المرسل
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // العلاقة العكسية مع المستقبل
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // العلاقة العكسية مع الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}