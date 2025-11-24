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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('long_description')->nullable();
            $table->json('tags')->nullable();
            $table->string('image_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('project_type')->nullable(); // e.g., 'AI/ML', 'Web', 'Mobile'
            $table->json('technologies')->nullable(); // Tech stack used
            $table->json('features')->nullable(); // Key features list
            $table->text('challenge')->nullable(); // Problem solved
            $table->text('solution')->nullable(); // Solution implemented
            $table->text('results')->nullable(); // Outcomes/metrics
            $table->boolean('featured')->default(false);
            $table->integer('order')->default(0);
            $table->integer('views_count')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            $table->index('slug');
            $table->index('featured');
            $table->index('order');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
