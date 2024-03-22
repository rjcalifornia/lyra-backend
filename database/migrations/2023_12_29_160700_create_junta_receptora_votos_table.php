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
        Schema::create('junta_receptora_votos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correlativo');
            $table->unsignedInteger('id_centro_votacion');
            $table->unsignedBigInteger('user_creates');
            $table->unsignedBigInteger('user_modifies')->nullable();
            $table->foreign('user_creates')->references('id')->on('users');
            $table->foreign('user_modifies')->references('id')->on('users');
            $table->foreign('id_centro_votacion')->references('id')->on('centro_votacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_count_board_catalog');
    }
};
