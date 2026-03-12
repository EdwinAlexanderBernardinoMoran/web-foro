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
        Schema::create('hearts', function (Blueprint $table) {
            $table->id();

            // Un corazón pertenece a un comentario y a un usuario
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->morphs('heartable'); // Estos corazones pueden estar asociados con preguntas, respuestas o comentarios
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hearts');
    }
};
