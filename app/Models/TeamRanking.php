<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamRanking extends Model
{
    use HasFactory;

    protected $table = 'team_ranking';

    protected $fillable = [
        'tournament_id',
        'team_id',
        'points',
    ];

    // Relación con el torneo
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    // Relación con el equipo
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
