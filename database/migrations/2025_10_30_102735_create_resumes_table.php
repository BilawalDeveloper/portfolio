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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('original_filename');
            $table->string('file_path');
            $table->string('file_type'); // pdf, docx, linkedin_url
            $table->integer('file_size')->nullable();
            $table->longText('raw_text')->nullable();
            $table->json('parsed_data')->nullable(); // Structured data: skills, education, experience
            $table->string('linkedin_url')->nullable();
            $table->boolean('consent_given')->default(false);
            $table->boolean('is_processed')->default(false);
            $table->boolean('is_reviewed')->default(false);
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->text('admin_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
