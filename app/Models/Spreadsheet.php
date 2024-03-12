<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spreadsheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id', // Otros atributos aquí...
    ];


    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'spreadsheet_user')
            ->latest('spreadsheet_user.created_at'); // Ordenar por fecha de creación en orden descendente
    }
}
