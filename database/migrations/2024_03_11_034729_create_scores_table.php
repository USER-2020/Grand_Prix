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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partido_id'); // Ajusta según tus necesidades
            $table->unsignedBigInteger('teamA_id'); // Ajusta según tus necesidades
            $table->unsignedBigInteger('teamB_id'); // Ajusta según tus necesidades
            $table->integer('teamA_score'); // Ajusta según tus necesidades
            $table->integer('teamB_score'); // Ajusta según tus necesidades

            // Claves foráneas
            // $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
            // $table->foreign('teamA_id')->references('id')->on('teams')->onDelete('cascade');
            // $table->foreign('teamB_id')->references('id')->on('teams')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
