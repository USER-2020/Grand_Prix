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
        
        // Schema::table('teams', function (Blueprint $table) {
        //     //
        //     $table->foreign('spreadsheet_id')->references('id')->on('spreadsheets')->onDelete('cascade');
        // });

        Schema::table('scores', function (Blueprint $table) {
            //
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
            $table->foreign('teamA_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('teamB_id')->references('id')->on('teams')->onDelete('cascade');
        });

        // Schema::table('partidos', function (Blueprint $table) {
        //     //
        //     $table->foreign('score_id')->references('id')->on('scores')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['spreadsheet_id']);
        });

        Schema::table('scores', function (Blueprint $table) {
            $table->dropForeign(['partido_id', 'team_id']);
        });

        Schema::table('partidos', function (Blueprint $table) {
            $table->dropForeign(['score_id']);
        });
    }
};
