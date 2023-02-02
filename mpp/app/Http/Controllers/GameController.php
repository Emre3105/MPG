<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\League;
use App\Models\Game;

class GameController extends Controller
{
    public function browse(Request $request) {
        if (isset($request->league_id)) {
            $playerIds = League::findOrFail($request->league_id)->players->pluck("id")->toArray();
            return Game::whereIn("home_player_id", $playerIds)->orWhereIn("visiting_player_id", $playerIds)->orderBy("game_number", "ASC")->orderBy("home_player_id", "ASC")->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }
    public function getGames() {
        return DB::table('games')->get();
    }

    public function getBasketballers($id) {
        return DB::table('line_ups')->where('player_id', $id)->get();
    }

    public function getPoints($id) {
        $name = DB::table('basketballers')->select('basketballers.name')->where('id', $id)->get();
        $name = $name[0]->name;
        return DB::table('stats')->select('stats.points')->where('basketballer_name', $name)->orderby('stats.date', 'desc')->first();
    }

    public function setPoints(Request $request) {
        $id1 = $request->id1;
        $id2 = $request->id2;
        $points1 = $request->points1;
        $points2 = $request->points2;
        DB::table('games')->where('home_player_id', $id1)
                          ->where('visiting_player_id', $id2)
                          ->update(['home_player_points' => $points1, 'visiting_player_points' => $points2]);
    }
}