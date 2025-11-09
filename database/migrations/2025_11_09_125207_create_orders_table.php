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
       Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tailor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['pending_quote', 'pending_confirmation', 'in_progress', 'completed', 'cancelled'])->default('pending_quote');
            $table->json('measurements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
