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
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->json('technologies')->nullable();
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('dataset_size')->nullable();
            $table->string('model_architecture')->nullable();
            $table->text('impact')->nullable();
            $table->json('metrics')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->json('country_visibility')->nullable(); // Array of country codes
            $table->timestamps();
            $table->softDeletes();
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
