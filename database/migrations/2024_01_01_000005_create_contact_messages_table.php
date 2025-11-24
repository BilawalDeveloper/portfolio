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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->string('subject')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('read')->default(false);
            $table->boolean('replied')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('honeypot')->nullable(); // For spam prevention
            $table->text('notes')->nullable(); // Admin notes
            $table->timestamps();
            
            $table->index('email');
            $table->index('read');
            $table->index('replied');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
