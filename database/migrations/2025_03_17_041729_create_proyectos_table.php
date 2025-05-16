<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto', 200);
            $table->text('descripcion');

            $table->enum('estado', ['En proceso', 'Finalizado'])->default('En proceso');

            $table->ForeignId('coordinador_id')
                ->constrained('coordinadores')
                ->onDelete('cascade');

            $table->foreignId('institucion_id')
                ->constrained('instituciones')
                ->onDelete('cascade');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
