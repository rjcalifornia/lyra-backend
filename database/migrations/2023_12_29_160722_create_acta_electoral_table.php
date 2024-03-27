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
        Schema::create('acta_electoral', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_centro_votacion');
            $table->unsignedInteger('id_junta_receptora');
            $table->integer('sobrantes')->nullable();
            $table->integer('inutilizados')->nullable();
            $table->integer('impugnados')->nullable();
            $table->integer('nulos')->nullable();
            $table->integer('abstenciones')->nullable();
            $table->integer('escrutados')->nullable();
            $table->integer('faltantes')->nullable();
            $table->integer('entregados')->nullable();
            $table->unsignedInteger('id_tipo_acta');
            $table->unsignedBigInteger('usuario_crea');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_crea')->references('id')->on('users');
            $table->foreign('usuario_modifica')->references('id')->on('users');
            $table->foreign('id_centro_votacion')->references('id')->on('centro_votacion');
            $table->foreign('id_junta_receptora')->references('id')->on('junta_receptora_votos');
            $table->foreign('id_tipo_acta')->references('id')->on('tipo_acta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acta_electoral');
    }
};
