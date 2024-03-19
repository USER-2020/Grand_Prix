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
        Schema::table('tournament_partidos', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(0); // Define la columna 'order' como un entero sin signo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tournament_partidos', function (Blueprint $table) {
            $table->dropColumn('order'); // Elimina la columna 'order' si se revierte la migración
        });
    }
};
