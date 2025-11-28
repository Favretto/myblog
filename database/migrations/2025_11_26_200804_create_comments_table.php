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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // ID del commento
            $table->foreignId('blog_id')->constrained('messaggi')->onDelete('cascade'); // FK al blog
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK all'utente
            $table->text('testo'); // Testo del commento
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
