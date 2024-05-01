<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        // otros campos...
        'winner',
    ];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_partidos');
    }

}
