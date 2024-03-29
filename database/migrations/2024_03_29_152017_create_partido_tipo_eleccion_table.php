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
        Schema::create('partido_tipo_eleccion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partido_id');
            $table->unsignedInteger('tipo_acta_id');
            $table->boolean('activo');
            $table->unsignedBigInteger('usuario_crea');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_crea')->references('id')->on('users');
            $table->foreign('usuario_modifica')->references('id')->on('users');
            $table->foreign('partido_id')->references('id')->on('partidos_politicos');
            $table->foreign('tipo_acta_id')->references('id')->on('tipo_acta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partido_tipo_eleccion');
    }
};
