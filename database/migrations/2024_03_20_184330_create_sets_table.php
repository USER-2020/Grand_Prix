<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('score_id');
            $table->unsignedBigInteger('partido_id');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('score_id')->references('id')->on('scores')->onDelete('cascade');
            $table->foreign('partido_id')->references('partido_id')->on('scores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
