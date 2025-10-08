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
        // Tabla de usuarios según los requisitos especificados
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono', 15);
            $table->string('email')->unique();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('fecha_ultima_modificacion')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('estado')->default(true); // true = activo, false = inactivo y será configurado más adelante
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
