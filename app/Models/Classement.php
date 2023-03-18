<?php

namespace App\Models;

use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classement extends Model
{
    use HasFactory;
    protected $table = "classement";
    protected $fillable = [
        "id_club",
        "match",
        "win",
        "draw",
        "lose",
        "goal_win",
        "goal_lose",
        "point",
    ];

    public function club()
    {
        return $this->belongsTo(Club::class, 'id_club', 'id');
    }
}
