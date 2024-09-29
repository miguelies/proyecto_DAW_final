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
        Schema::create('usu_gru', function (Blueprint $table) {
            $table->id('cod_usu_gru');
            $table->unsignedBigInteger('codigo_usuario');
            $table->foreign('codigo_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('codigo_grupos');
            $table->foreign('codigo_grupos')->references('cod_grupo')->on('grupos')->onDelete('cascade');
            $table->boolean('administrador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usu_gru');
    }
};
