<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentPartido extends Model
{
    use HasFactory;

    protected $table = 'tournament_partidos'; // Nombre de la tabla intermedia

    /**
     * Define la relación con el modelo Tournament.
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    /**
     * Define la relación con el modelo Partido.
     */
    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
