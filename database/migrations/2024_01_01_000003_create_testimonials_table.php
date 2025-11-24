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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('company')->nullable();
            $table->string('company_url')->nullable();
            $table->text('content');
            $table->string('avatar_url')->nullable();
            $table->integer('rating')->default(5); // 1-5 stars
            $table->string('project_related')->nullable(); // Related project slug
            $table->boolean('featured')->default(false);
            $table->boolean('approved')->default(false);
            $table->integer('order')->default(0);
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
            
            $table->index('featured');
            $table->index('approved');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
