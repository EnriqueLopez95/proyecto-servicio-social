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
        Schema::create('coordinadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_coordinador', 100);
            $table->string('apellido_coordinador', 100);
            $table->string('correo_coordinador', 100);
            $table->string('telefono_coordinador', 15);

            $table->foreignId('coordinacion_id')
                ->constrained('coordinaciones')
                ->onDelete('cascade');

            $table->foreignId('user_id',)
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
        Schema::dropIfExists('coordinadores');
    }
};
