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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id('cod_actividad');
            $table->text('nombre_actividad');
            $table->text('descripcion_actividad');
            $table->boolean('estado_actividades');
            $table->date('fecha_cierre')->format('Y-m-d')->nullable();
            $table->time('hora_cierre')->format('H:i:s')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
