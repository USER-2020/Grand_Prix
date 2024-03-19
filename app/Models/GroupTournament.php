<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'tournament_id',
    ];

    // Definir relaciones con los modelos Group y Tournament
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
