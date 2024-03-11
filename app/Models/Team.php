<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }

    public function spreadsheet()
    {
        return $this->hasOne(Spreadsheet::class);
    }

    public function scoresAsTeamA()
    {
        return $this->hasMany(Score::class, 'teamA_id');
    }

    public function scoresAsTeamB()
    {
        return $this->hasMany(Score::class, 'teamB_id');
    }
}
