<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchFormRequest;
use App\Models\Classement;
use App\Models\Club;
use App\Models\Match_club;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $clubs = Club::all();
        return view("match.index", compact("clubs"));
    }

    public function store(MatchFormRequest $request)
    {
        foreach ($request->input("inputaddMoreInputFields") as  $value) {
            if ($value["nama_klub1"] == $value["nama_klub2"]) {
                return redirect()->back()->withErrors(["error" => "tidak bisa masukan nama klub yang sama pada pertandingan yang sama"]);
            }
            // $klub1 = Match_club::where("klub_id_1", $value["nama_klub1"])->first();
            // $klub2 = Match_club::where("klub_id_2", $value["nama_klub2"])->first();
            // if (isset($klub1) && isset($klub2)) {
            //     return redirect()->back()->withErrors(["error" => "Data pertandingan sudah di masukkan"]);
            // }
            Match_club::create([
                "klub_id_1" => $value["nama_klub1"],
                "score_1" => $value["score1"],
                "klub_id_2" => $value["nama_klub2"],
                "score_2" => $value["score2"],
            ]);
            $ck1 = Classement::where("id_club", $value["nama_klub1"])->first();
            $ck2 = Classement::where("id_club", $value["nama_klub2"])->first();
            if ($value["score1"] > $value["score2"]) {
                $ck1->update([
                    "id_club" => $value["nama_klub1"],
                    "match" => $ck1->match + 1,
                    "win" => $ck1->win + 1,
                    "goal_win" => $ck1->goal_win + $value["score1"],
                    "goal_lose" => $ck1->goal_lose + $value["score2"],
                    "point" => $ck1->point + 3
                ]);
                $ck2->update([
                    "id_club" => $value["nama_klub2"],
                    "match" => $ck2->match + 1,
                    "lose" => $ck2->lose + 1,
                    "goal_win" => $ck2->goal_win + $value["score2"],
                    "goal_lose" => $ck2->goal_lose + $value["score1"]
                ]);
            } else if ($value["score1"] == $value["score2"]) {
                $ck1->update([
                    "id_club" => $value["nama_klub1"],
                    "match" => $ck1->match + 1,
                    "draw" => $ck1->draw + 1,
                    "goal_win" => $ck1->goal_win + $value["score1"],
                    "goal_lose" => $ck1->goal_lose + $value["score2"],
                    "point" => $ck1->point + 1
                ]);
                $ck2->update([
                    "id_club" => $value["nama_klub2"],
                    "match" => $ck2->match + 1,
                    "draw" => $ck2->draw + 1,
                    "goal_win" => $ck2->goal_win + $value["score2"],
                    "goal_lose" => $ck2->goal_lose + $value["score1"],
                    "point" => $ck2->point + 1
                ]);
            } else {
                $ck2->update([
                    "id_club" => $value["nama_klub2"],
                    "match" => $ck2->match + 1,
                    "win" => $ck2->win + 1,
                    "goal_win" => $ck2->goal_win + $value["score2"],
                    "goal_lose" => $ck2->goal_lose + $value["score1"],
                    "point" => $ck2->point + 3
                ]);
                $ck1->update([
                    "id_club" => $value["nama_klub1"],
                    "match" => $ck1->match + 1,
                    "lose" => $ck1->lose + 1,
                    "goal_win" => $ck1->goal_win + $value["score1"],
                    "goal_lose" => $ck1->goal_lose + $value["score2"]
                ]);
            }
        }


        return redirect()->back()->with("success", "Berhasil menambahkan match.");
    }
}
