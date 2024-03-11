<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'partido_id',
        'teamA_id',
        'teamB_id',
        'teamA_score',
        'teamB_score',
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'teamA_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'teamB_id');
    }
}
