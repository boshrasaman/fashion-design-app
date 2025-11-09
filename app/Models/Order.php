<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    // السماح بتعبئة جميع الحقول لتبسيط المثال، ولكن يفضل استخدام $fillable في المشاريع الحقيقية
    protected $guarded = [];

    // تحويل حقل المقاسات JSON إلى مصفوفة PHP تلقائياً
    protected $casts = [
        'measurements' => 'array',
    ];

    /**
     * العلاقة العكسية: الطلب يعود لزبون واحد.
     */
    public function customer(): BelongsTo
    {
        // استخدام 'customer_id' كمفتاح خارجي
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * العلاقة العكسية: الطلب مرتبط بخياطة واحدة (يمكن أن يكون null إذا كان بانتظار عروض الأسعار).
     */
    public function tailor(): BelongsTo
    {
        // استخدام 'tailor_id' كمفتاح خارجي
        return $this->belongsTo(User::class, 'tailor_id');
    }

    /**
     * علاقة العناصر: الطلب يحتوي على عنصر واحد أو أكثر (في حال تطوير السلة لاحقاً).
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * علاقة عروض الأسعار: الطلب يمكن أن يستقبل العديد من عروض الأسعار من الخياطات.
     */
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * علاقة التقييم: الطلب يمكن أن يحتوي على تقييم واحد فقط (حسب قيود قاعدة البيانات).
     */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
    
    /**
     * علاقة الرسائل: الطلب يمكن أن يكون له محادثات فورية مرتبطة به.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}