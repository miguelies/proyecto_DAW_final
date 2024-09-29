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
        Schema::create('usu_act', function (Blueprint $table) {
            $table->id('cod_usu_act');
            $table->unsignedBigInteger('codigo_usuario');
            $table->foreign('codigo_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cod_actividad');
            $table->foreign('cod_actividad')->references('cod_actividad')->on('actividades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usu_act');
    }
};
