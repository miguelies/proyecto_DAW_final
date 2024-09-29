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
        Schema::create('act_arch', function (Blueprint $table) {
            $table->id('cod_act_arch');
            $table->unsignedBigInteger('cod_actividad');
            $table->foreign('cod_actividad')->references('cod_actividad')->on('actividades')->onDelete('cascade');
            $table->unsignedBigInteger('cod_archivos');
            $table->foreign('cod_archivos')->references('cod_archivos')->on('archivos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('act_arch');
    }
};
