<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match_club extends Model
{
    use HasFactory;
    protected $table = "match";
    protected $fillable = [
        "klub_id_1",
        "score_1",
        "klub_id_2",
        "score_2",
    ];
}
