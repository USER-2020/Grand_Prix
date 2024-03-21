<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'score_id',
        'partido_id',
    ];

    public function scores()
    {
        return $this->hasMany(Score::class, 'id', 'score_id'); // 'id' representa el id del Set y 'score_id' el id del Score asociado
    }

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
