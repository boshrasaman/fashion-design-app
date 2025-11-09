<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. المدير
        DB::table('users')->insert([
            'name' => 'إدارة الموقع',
            'email' => 'admin@dress.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone_number' => '0990123456',
            'bio' => 'مسؤول المدير العام ومراجعة الحسابات.'
        ]);

        // 2. وكيل دفع معتمد
        DB::table('users')->insert([
            'name' => 'مركز الصرافة المعتمد',
            'email' => 'payment@cash.com',
            'password' => Hash::make('password'),
            'role' => 'payment_agent',
            'phone_number' => '0933555111',
            'bio' => 'وكيل دفع مباشر معتمد لزيادة الأرصدة.'
        ]);
        
        // 3. المصممون (Designer)
        DB::table('users')->insert([
            'name' => 'ياسمين عبيد',
            'email' => 'yasmeen.design@dress.com',
            'password' => Hash::make('password'),
            'role' => 'designer',
            'phone_number' => '0944000111',
            'bio' => 'مصممة أزياء سورية متخصصة بالفساتين الكلاسيكية.'
        ]);

        DB::table('users')->insert([
            'name' => 'علياء حداد',
            'email' => 'alyaa.haddad@dress.com',
            'password' => Hash::make('password'),
            'role' => 'designer',
            'phone_number' => '0933222333',
            'bio' => 'مصممة فساتين زفاف وسهرة بلمسة شرقية.'
        ]);

        // 4. الخياطون (Tailor)
        DB::table('users')->insert([
            'name' => 'مشغل أميرة للخياطة',
            'email' => 'amira.tailor@dress.com',
            'password' => Hash::make('password'),
            'role' => 'tailor',
            'phone_number' => '0988777666',
            'bio' => 'خياطة وتفصيل احترافي في دمشق. خبرة 20 عاماً.'
        ]);
        
        DB::table('users')->insert([
            'name' => 'ليلى العبدالله',
            'email' => 'layla.tailor@dress.com',
            'password' => Hash::make('password'),
            'role' => 'tailor',
            'phone_number' => '0999555444',
            'bio' => 'متخصصة بخياطة الفساتين الحديثة والموديلات الأوروبية.'
        ]);
        
        // 5. الزبائن (Customer)
        DB::table('users')->insert([
            'name' => 'مرح الحلبي',
            'email' => 'marah.h@dress.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone_number' => '0955111222'
        ]);
        
        DB::table('users')->insert([
            'name' => 'نور زكريا',
            'email' => 'nour.z@dress.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone_number' => '0966333444'
        ]);
    }
}