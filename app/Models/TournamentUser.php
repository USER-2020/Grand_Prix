<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentUser extends Model
{
    use HasFactory;

    protected $table = 'tournament_user';

    protected $fillable = [
        'user_id',
        'tournament_id',
    ];

    // Relación muchos a uno con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a uno con Tournament
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
