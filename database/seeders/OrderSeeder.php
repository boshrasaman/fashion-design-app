<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $marah_id = User::where('name', 'مرح الحلبي')->first()->id;
        $layla_id = User::where('name', 'ليلى العبدالله')->first()->id;

        // 1. طلب جاهز للتسعير (سيناريو التصميم المخصص)
        DB::table('orders')->insert([
            'customer_id' => $marah_id,
            'status' => 'pending_quote',
            'measurements' => json_encode(['chest' => 92, 'waist' => 65, 'length' => 150]),
            'created_at' => now(),
        ]);

        // 2. طلب تم تأكيده وبانتظار التنفيذ (سيناريو تصميم جاهز)
        DB::table('orders')->insert([
            'customer_id' => $marah_id,
            'tailor_id' => $layla_id, // تم اختيار الخياطة مسبقاً
            'total_amount' => 60000.00, // تم الاتفاق على السعر
            'status' => 'in_progress',
            'measurements' => json_encode(['chest' => 88, 'waist' => 60, 'length' => 140]),
            'created_at' => now()->subDays(5),
        ]);
    }
}