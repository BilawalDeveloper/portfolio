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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('long_description')->nullable();
            $table->string('icon')->nullable(); // Icon name or SVG path
            $table->json('features')->nullable(); // List of features/deliverables
            $table->string('price_range')->nullable(); // e.g., "$5000 - $10000"
            $table->string('duration')->nullable(); // e.g., "2-4 weeks"
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
            
            $table->index('slug');
            $table->index('order');
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
