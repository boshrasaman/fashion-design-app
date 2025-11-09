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
       Schema::create('custom_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->string('top_dress_part')->nullable();
            $table->string('bottom_dress_part')->nullable();
            $table->string('fabric_type')->nullable();
            $table->string('fabric_color', 100)->nullable();
            $table->json('additional_images')->nullable();
            $table->text('notes')->nullable();
            $table->string('final_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_designs');
    }
};
