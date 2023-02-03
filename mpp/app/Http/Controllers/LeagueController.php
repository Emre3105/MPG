<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\League;
use App\Models\Player;
use App\Models\TransferMarket;
use App\Models\LineUp;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LeagueStoreRequest;
use Illuminate\Support\Str;

class LeagueController extends Controller
{
    public function browse()
    {
        $userId = Auth::user()->id;

        $leagues = DB::table('leagues')
            ->select('leagues.*', 'players.favorite')
            ->join('players', 'leagues.id', '=', 'players.league_id')
            ->join('users', 'players.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->orderBy('players.favorite', 'desc')
            ->orderBy('leagues.status', 'asc')
            ->orderBy('leagues.name', 'asc')
            ->get();

        $recommendableLeagues = League::whereNotIn('id', $leagues->pluck('id'))
            ->whereRaw('current_players < max_players')
            ->get();
        $recommendedLeagues = array_filter([
            $recommendableLeagues->where('max_players', 2)->first(),
            $recommendableLeagues->where('max_players', 4)->first(),
            $recommendableLeagues->where('max_players', 6)->first(),
            $recommendableLeagues->where('max_players', 8)->first()
        ]);
        
        return [
            'leagues' => $leagues->toArray(),
            'recommendedLeagues' => $recommendedLeagues
        ];
    }

    public function favorite(Request $request)
    {
        if ($request->league_id) {
            $player = Player::where([
                'user_id' => Auth::user()->id,
                'league_id' => $request->league_id,
            ])->first();
            if ($player) {
                $player->favorite = !$player->favorite;
                $player->save();
                return("Changes applied");
            }
        }
        return("Can't apply changes");
    }

    public function join($code) {
        $userId = Auth::user()->id;
        $league = League::where('code', $code)->first();
        if (!$league) {
            return redirect()->route('league.browse')->withErrors(['not_exists' => "Désolé, cette ligue n'existe pas."]);
        }
        if ($league->current_players >= $league->max_players) {
            return redirect()->route('league.browse')->withErrors(['limit' => "Désolé, cette ligue est pleine."]);
        }
        if (Player::where(['user_id' => $userId,'league_id' => $league->id])->exists()) {
            return redirect()->route('league.browse')->withErrors(['already' => "Désolé, vous faites déjà partie de cette ligue."]);
        }
        $player = Player::create([
            'user_id' => $userId,
            'league_id' => $league->id
        ]);
        TransferMarket::create([
            'player_id' => $player->id
        ]);
        LineUp::create([
            'player_id' => $player->id
        ]);
        $league->current_players = $league->current_players + 1;
        $league->save();
        return view('league', [
            'league' => $league
        ]);
    }

    public function store(LeagueStoreRequest $request) {
        $league = League::create([
            'name' => $request->name,
            'code' => Str::random(8),
            'current_players' => 1,
            'max_players' => $request->max_players,
            'admin_id' => Auth::user()->id
        ]);

        $player = Player::create([
            'user_id' => Auth::user()->id,
            'league_id' => $league->id
        ]);
        TransferMarket::create([
            'player_id' => $player->id
        ]);
        LineUp::create([
            'player_id' => $player->id
        ]);

        return $league;
    }

    public function show($code) {
        $league = League::where('code', $code)->firstOrFail();
        if (Player::where('league_id', $league->id)->where('user_id', Auth::user()->id)->exists()) {
            return view('league', [
                'league' => $league,
                'validated' => TransferMarket::where('player_id', Player::where('league_id', $league->id)->where('user_id', Auth::user()->id)->first()->id)->first()->validated_at ? true : false
            ]);
        }
        return redirect()->route('home.index')->withErrors(['error' => "Désolé, vous n'avez pas accès à cette ligue."]);
    }

    public function browsePlayerNames($id) {
        $league = League::findOrFail($id);
        return DB::table('users')->select('users.username')->whereIn('users.id', $league->players->pluck("user_id"))->get();
    }

    public function browsePlayerIdAndNames($id) {
        $league = League::findOrFail($id);
        // return DB::table('users')->select('users.username', 'players.id')->whereIn('users.id', $league->players->pluck("user_id"))->get();
        return DB::table('users')
            ->join('players', 'users.id', '=', 'players.user_id')
            ->join('leagues', 'leagues.id', '=', 'players.league_id')
            ->where('leagues.id', $id)
            ->select('users.username', 'players.id')->get();
    }

    public function launch($id) {
        $league = League::findOrFail($id);
        if (Player::where('league_id', $league->id)->where('user_id', Auth::user()->id)->exists()) {
            if (Auth::user()->id == $league->admin_id) {
                $league->status = 1;
                $league->save();
                return view('league', [
                    'league' => $league
                ]);
            }
            return redirect()->route('league.show', $league->code)->withErrors(['error' => "Désolé, vous n'avez pas les droits sur cette ligue."]);
        }
        return redirect()->route('home.index')->withErrors(['error' => "Désolé, vous n'avez pas les droits sur cette ligue."]);
    }

    public function currentGame($id) {
        $leagueid = DB::table('players')->select('players.league_id')->where('id', $id)->get();
        $leagueid = $leagueid[0]->league_id;
        return DB::table('leagues')->select('leagues.current_game')->where('id', $leagueid)->get();
    }

    public function incrementCurrentGame($id) {
        $leagueid = DB::table('players')->select('players.league_id')->where('id', $id)->get();
        $leagueid = $leagueid[0]->league_id;
        $league = League::findOrFail($leagueid);
        $currentGame = $league->current_game;
        if($currentGame <= (($league->max_players - 1) * 2)){
            $league->current_game = $league->current_game + 1;
            $league->save();
        }else{
            $league->status = 3;
            $league->save();
        }
        return $league;
    }
}