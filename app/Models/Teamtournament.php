<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamtournament extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'team_tournament';

    protected $fillable = [
        'team_id',
        'tournament_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
