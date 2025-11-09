<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Design extends Model
{
    /**
     * الحقول المسموح بتعبئتها بشكل جماعي (Mass Assignment).
     * يتم إهمال استخدام protected $guarded = []; هنا لتحقيق أمان أفضل.
     */
    protected $fillable = [
        'designer_id',
        'title',
        'description',
        'cover_image',
        'status',
    ];
    
    /**
     * العلاقة العكسية: التصميم يعود لمصمم واحد.
     */
    public function designer(): BelongsTo
    {
        // استخدام 'designer_id' كمفتاح خارجي والربط بجدول users
        return $this->belongsTo(User::class, 'designer_id');
    }

    /**
     * علاقة المنتجات الجاهزة: التصميم يمكن أن يُستخدم لإنشاء عدة منتجات جاهزة.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    /**
     * علاقة عناصر الطلبات: التصميم يمكن أن يكون جزءاً من العديد من الطلبات.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}