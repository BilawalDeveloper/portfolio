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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('session_id')->index();
            $table->string('role'); // user, assistant, system
            $table->longText('message');
            $table->json('metadata')->nullable(); // Context, sources, tokens used
            $table->string('model')->nullable(); // LLM model used
            $table->integer('tokens_used')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
            $table->index(['session_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
