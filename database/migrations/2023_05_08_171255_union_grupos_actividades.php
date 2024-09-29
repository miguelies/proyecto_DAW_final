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
        Schema::create('grup_act', function (Blueprint $table) {
            $table->id('cod_grup_act');
            $table->unsignedBigInteger('cod_grupos');
            $table->foreign('cod_grupos')->references('cod_grupo')->on('grupos')->onDelete('cascade');
            $table->unsignedBigInteger('cod_actividades');
            $table->foreign('cod_actividades')->references('cod_actividad')->on('actividades')->onDelete('cascade');
            $table->unsignedBigInteger('codigo_usuario');
            $table->foreign('codigo_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_act');
    }
};
