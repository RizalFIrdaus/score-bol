<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use Illuminate\Http\Request;
use App\Models\Match_club;

class ClassementController extends Controller
{
    public function index()
    {
        $classements = Classement::orderBy('point', 'desc')->orderBy('goal_win', 'desc')->orderBy('goal_lose', 'asc')->get();
        return view("klasemen.index", compact("classements"));
    }

    public function clear(){
        Classement::query()->update([
            "match" => 0,
            "win" => 0,
            "draw" => 0,
            "lose" => 0,
            "goal_win" =>0,
            "goal_lose" => 0,
            "point" =>0
        ]);
        Match_club::query()->delete();
        return redirect()->back();
    }
}
