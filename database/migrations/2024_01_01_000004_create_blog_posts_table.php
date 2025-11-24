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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('author')->default('AI.DEV');
            $table->string('featured_image')->nullable();
            $table->json('tags')->nullable();
            $table->json('categories')->nullable();
            $table->string('status')->default('draft'); // draft, published, archived
            $table->integer('views_count')->default(0);
            $table->integer('reading_time')->nullable(); // in minutes
            $table->json('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            $table->index('slug');
            $table->index('status');
            $table->index('published_at');
            $table->index('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
