<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            // الأساسيات أولاً
            UserSeeder::class,
            CategorySeeder::class,
            
            // العلاقات
            WalletSeeder::class, // يعتمد على Users
            DesignerAndDesignSeeder::class, // يعتمد على Users
            ProductSeeder::class, // يعتمد على Designs, Users, Categories
            OrderSeeder::class, // يعتمد على Users
            ReviewSeeder::class, // يعتمد على Users, Orders
            TailorAndQuoteSeeder::class, // يعتمد على Users, Orders
        ]);
    }
}