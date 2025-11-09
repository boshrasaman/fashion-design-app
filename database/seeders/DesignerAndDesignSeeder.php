<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignerAndDesignSeeder extends Seeder
{
    public function run(): void
    {
        $yasmeen_id = User::where('name', 'ياسمين عبيد')->first()->id;
        $alyaa_id = User::where('name', 'علياء حداد')->first()->id;

        // 1. تصميم من ياسمين (فستان سهرة)
        DB::table('designs')->insert([
            'designer_id' => $yasmeen_id,
            'title' => 'فستان سهرة ملكي باللون الكحلي',
            'description' => 'فستان سهرة طويل بقصة حورية البحر من قماش المخمل، مع تطريز خفيف على الصدر.',
            'cover_image' => 'images/designs/design_yasmeen_1.jpg', // مسار افتراضي للصورة
            'status' => 'approved',
            'created_at' => now(),
        ]);
        
        // 2. تصميم من علياء (فستان زفاف)
        DB::table('designs')->insert([
            'designer_id' => $alyaa_id,
            'title' => 'فستان زفاف بقصة الأميرة والطرحة الطويلة',
            'description' => 'تصميم كلاسيكي من التول والدانتيل الفرنسي، بدون حمالات (Strapless) ومناسبة للخياطة حسب الطلب.',
            'cover_image' => 'images/designs/design_alyaa_1.jpg',
            'status' => 'approved',
            'created_at' => now(),
        ]);
    }
}