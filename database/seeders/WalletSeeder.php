<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إعطاء رصيد للزبائن
        $marah = User::where('name', 'مرح الحلبي')->first()->id;
        $nour = User::where('name', 'نور زكريا')->first()->id;
        
        // 2. إعطاء رصيد مبدئي للموقع (لإجراء عمليات السحب)
        $admin = User::where('role', 'admin')->first()->id;

        // 3. إنشاء المحافظ
        DB::table('wallets')->insert([
            ['user_id' => $marah, 'balance' => 50000.00], // 50 ألف ل.س (زبون جاهز للشراء)
            ['user_id' => $nour, 'balance' => 25000.00], 
            ['user_id' => $admin, 'balance' => 1000000.00], // رصيد احتياطي
            // المصممون والخياطون يبدأون برصيد 0
            ['user_id' => User::where('name', 'ياسمين عبيد')->first()->id, 'balance' => 0.00],
            ['user_id' => User::where('name', 'علياء حداد')->first()->id, 'balance' => 0.00],
            ['user_id' => User::where('name', 'مشغل أميرة للخياطة')->first()->id, 'balance' => 0.00],
            ['user_id' => User::where('name', 'ليلى العبدالله')->first()->id, 'balance' => 0.00],
            ['user_id' => User::where('role', 'payment_agent')->first()->id, 'balance' => 0.00],
        ]);
    }
}