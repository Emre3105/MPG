<?php

namespace App\Http\Controllers;

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
}