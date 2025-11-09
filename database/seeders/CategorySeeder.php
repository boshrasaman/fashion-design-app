<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $evening = Category::create(['name' => 'فساتين سهرة']);
        $wedding = Category::create(['name' => 'فساتين زفاف']);
        $casual = Category::create(['name' => 'فساتين يومية']);
        
        // تصنيفات فرعية
        Category::create(['name' => 'قماش ساتان', 'parent_id' => $evening->id]);
        Category::create(['name' => 'قماش حرير', 'parent_id' => $evening->id]);
        Category::create(['name' => 'فستان قصير', 'parent_id' => $casual->id]);
        Category::create(['name' => 'فستان طويل', 'parent_id' => $casual->id]);
    }
}