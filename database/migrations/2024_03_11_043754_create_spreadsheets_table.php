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
        Schema::create('spreadsheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id'); // Ajusta según tus necesidades
            // $table->unsignedBigInteger('user_id'); // Ajusta según tus necesidades
            $table->integer('shirt_number'); // Ajusta según tus necesidades

            // Claves foráneas
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spreadsheets');
    }
};
