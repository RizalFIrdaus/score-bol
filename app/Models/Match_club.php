<?php

namespace App\Models;

use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function club1()
    {
        return $this->belongsTo(Club::class, 'klub_id_1', 'id');
    }
    public function club2()
    {
        return $this->belongsTo(Club::class, 'klub_id_2', 'id');
    }
}
