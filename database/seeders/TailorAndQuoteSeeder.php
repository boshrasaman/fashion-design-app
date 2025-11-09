<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TailorAndQuoteSeeder extends Seeder
{
    public function run(): void
    {
        $tailor_amira_id = User::where('name', 'مشغل أميرة للخياطة')->first()->id;
        $tailor_layla_id = User::where('name', 'ليلى العبدالله')->first()->id;
        $order_pending_id = Order::where('status', 'pending_quote')->first()->id;

        // 1. عرض سعر من مشغل أميرة للطلب بانتظار التسعير
        DB::table('quotes')->insert([
            'order_id' => $order_pending_id,
            'tailor_id' => $tailor_amira_id,
            'price' => 55000.00,
            'notes' => 'يمكن تنفيذ هذا التصميم بقماش تفتا ممتاز، مدة التنفيذ 10 أيام.',
            'status' => 'pending',
            'created_at' => now(),
        ]);
        
        // 2. عرض سعر من ليلى لنفس الطلب
        DB::table('quotes')->insert([
            'order_id' => $order_pending_id,
            'tailor_id' => $tailor_layla_id,
            'price' => 65000.00,
            'notes' => 'سيتم استخدام أفضل أنواع الأقمشة الفرنسية، مدة التنفيذ 7 أيام فقط.',
            'status' => 'pending',
            'created_at' => now(),
        ]);
    }
}