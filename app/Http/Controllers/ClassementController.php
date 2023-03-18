<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    public function index()
    {
        $classements = Classement::orderBy('point', 'desc')->orderBy('goal_win', 'desc')->orderBy('goal_lose', 'asc')->get();
        return view("klasemen.index", compact("classements"));
    }
}
