<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadsheetUser extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'spreadsheet_user';

    protected $fillable = [
        'spreadsheet_id',
        'user_id',
    ];

    // Relación muchos a uno con Spreadsheet
    public function spreadsheet()
    {
        return $this->belongsTo(Spreadsheet::class);
    }

    // Relación muchos a uno con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
