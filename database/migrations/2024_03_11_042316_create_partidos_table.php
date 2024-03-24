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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->string('reference'); // Ajusta según tus necesidades
            // $table->unsignedBigInteger('score_id'); // Ajusta según tus necesidades
            $table->string('fase'); // Ajusta según tus necesidades
            $table->boolean('activo');
            $table->boolean('finish');

            // Clave foránea
            // $table->foreign('score_id')->references('id')->on('scores')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
