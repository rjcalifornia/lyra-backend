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
        Schema::create('centro_votacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('id_distrito');
            $table->integer('cantidad_mesas_votacion');
            $table->boolean('activo')->nullable();
            $table->unsignedBigInteger('usuario_crea');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_crea')->references('id')->on('users');
            $table->foreign('usuario_modifica')->references('id')->on('users');
            $table->foreign('id_distrito')->references('id')->on('distritos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_votacion');
    }
};
