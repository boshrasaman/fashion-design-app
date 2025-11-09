<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $marah_id = User::where('name', 'مرح الحلبي')->first()->id;
        $layla_id = User::where('name', 'ليلى العبدالله')->first()->id;

        // يجب أن يكون هناك طلب "Completed" لإنشاء تقييم (نفترض وجود طلب سابق تم إكماله)
        // سنفترض وجود طلب سابق برقم 3 تم إكماله بين مرح وليلى
        
        // 1. تقييم من مرح للخياطة ليلى
        DB::table('reviews')->insert([
            'customer_id' => $marah_id,
            'tailor_id' => $layla_id,
            'order_id' => 2, // نفترض أن الطلب رقم 2 هو طلب تم تنفيذه مسبقاً 
            'rating' => 5,
            'comment' => 'تجربة ممتازة، الخياطة دقيقة جداً ومتقنة! شكراً ليلى.',
            'created_at' => now(),
        ]);
    }
}