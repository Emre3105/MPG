<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Basketballer;
use App\Models\League;
use App\Models\Player;

class BasketballerController extends Controller
{
    public function index() {
        return view('basketballers');
    }

    public function browse(Request $request) {
        if (!isset($request->column)) {
            $request->column = "odds";
        }
        if (!isset($request->direction)) {
            $request->direction = "desc";
        }
        if (
            in_array($request->column, ["name", "team", "position", "odds"]) &&
            ($request->direction == "asc" || $request->direction == "desc")
        ) {
            if (isset($request->filter) && $request->filter != "") {
                return Basketballer::where('name','LIKE','%'.$request->filter.'%')
                    ->orWhere('team','LIKE','%'.$request->filter.'%')
                    ->orWhere('position','LIKE','%'.$request->filter.'%')
                    ->orderBy($request->column, $request->direction)
                    ->get();
            }
            return Basketballer::orderBy($request->column, $request->direction)->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }

    public function bought(Request $request) {
        if (isset($request->league_id)) {
            $players = League::findOrFail($request->league_id)->players->pluck("id")->toArray();
            return DB::table('basketballers_players')
                ->select('basketballers_players.basketballer_id')
                ->whereIn('basketballers_players.player_id', $players)
                ->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }

    public function boughtByPlayer(Request $request) {
        if (isset($request->league_id)) {
            $player = Player::where([
                'user_id' => Auth::user()->id,
                'league_id' => $request->league_id,
            ])->first();
            return DB::table('basketballers_players')
                ->join('basketballers', 'basketballers_players.basketballer_id', '=', 'basketballers.id')
                ->select(array('basketballers.id', 'basketballers.name', 'basketballers.position', 'basketballers_players.price'))
                ->where('basketballers_players.player_id', $player->id)
                ->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }
}