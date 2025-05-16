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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_estudiante', 100);
            $table->string('apellido_estudiante', 100);
            $table->string('carnet', 20)->unique();
            $table->string('correo_estudiante', 100)->unique();
            $table->string('telefono_estudiante', 15);

            $table->foreignId('carrera_id')
                ->constrained('carreras')
                ->onDelete('cascade');

            $table->foreignId('proyectos_id')
                ->constrained('proyectos')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
