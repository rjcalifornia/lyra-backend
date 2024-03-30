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
        Schema::create('votos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_partido');
            $table->unsignedInteger('id_acta_electoral');
            $table->integer('votos');
            $table->unsignedBigInteger('user_creates');
            $table->unsignedBigInteger('user_modifies')->nullable();
            $table->foreign('user_creates')->references('id')->on('users');
            $table->foreign('user_modifies')->references('id')->on('users');
            $table->foreign('id_partido')->references('id')->on('partidos_politicos');
            $table->foreign('id_acta_electoral')->references('id')->on('acta_electoral');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votos');
    }
};
