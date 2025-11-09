<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Design;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $tailor_amira_id = User::where('name', 'مشغل أميرة للخياطة')->first()->id;
        $design_yasmeen_id = Design::where('title', 'فستان سهرة ملكي باللون الكحلي')->first()->id;
        $category_evening_id = Category::where('name', 'فساتين سهرة')->first()->id;

        // منتج جاهز (تم تصميمه من ياسمين وخياطته من مشغل أميرة)
        DB::table('products')->insert([
            'design_id' => $design_yasmeen_id,
            'tailor_id' => $tailor_amira_id,
            'category_id' => $category_evening_id,
            'name' => 'فستان سهرة مخمل جاهز (مقاس M)',
            'price' => 75000.00, // السعر شامل التصميم والخياطة
            'description' => 'تنفيذ جاهز للتصميم رقم ' . $design_yasmeen_id . '، متوفر بمقاس متوسط.',
            'image' => 'images/products/product_amira_1.jpg',
            'stock' => 3,
            'created_at' => now(),
        ]);
    }
}