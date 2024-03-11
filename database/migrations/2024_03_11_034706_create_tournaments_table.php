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

        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ajusta según tus necesidades
            $table->integer('room_size'); // Ajusta según tus necesidades
            $table->text('description')->nullable(); // Puedes permitir valores nulos si es opcional
            

            // Claves foráneas
            // $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->dateTime('date_start'); // Ajusta según tus necesidades
            $table->dateTime('date_close'); // Ajusta según tus necesidades

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
