<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Classement;
use Illuminate\Http\Request;
use App\Http\Requests\KlubFormRequest;

class ClubController extends Controller
{
    public function index()
    {

        return view("klub.index");
    }

    public function store(KlubFormRequest $request)
    {
        $exist = Club::where("nama_klub", $request->input("nama_klub"))->exists();
        if ($exist) {
            return redirect()->back()->withErrors(["error" => "nama klub yang kamu masukkan sudah terdaftar"]);
        }
        $club = Club::create([
            "nama_klub" => strtolower($request->input("nama_klub")),
            "kota_klub" => $request->input("kota_klub"),
        ]);

        Classement::create([
            "id_club" => $club->id,
            "match" => 0,
            "win" => 0,
            "draw" => 0,
            "lose" => 0,
            "goal_win" => 0,
            "goal_lose" => 0,
            "point" => 0,
        ]);

        return redirect()->back()->with("success", "Berhasil menambahkan klubmu.");
    }
}
