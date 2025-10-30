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
        Schema::create('theme_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('theme_name')->default('default');
            $table->json('color_palette')->nullable(); // Primary, secondary, accent colors
            $table->string('hero_image')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->json('sections_visibility')->nullable(); // Which sections to show
            $table->json('highlighted_projects')->nullable(); // Project IDs to feature
            $table->text('custom_css')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_configurations');
    }
};
