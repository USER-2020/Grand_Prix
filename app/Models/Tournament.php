<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_size',
        'description',
        'date_start',
        'date_close',
    ];

    protected $dates = ['date_start', 'date_close'];
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function partidos()
    {
        return $this->belongsToMany(Partido::class, 'tournament_partidos');
    }

}
