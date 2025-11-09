<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('design_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('custom_design_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('designer_share', 10, 2)->default(0.00);
            $table->decimal('tailor_share', 10, 2)->default(0.00);
            $table->decimal('site_share', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
