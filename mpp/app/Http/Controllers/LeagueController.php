<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\League;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

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
        Player::create([
            'user_id' => $userId,
            'league_id' => $league->id
        ]);
        $league->current_players = $league->current_players + 1;
        $league->save();
        return redirect()->route('home.index')->with('message', 'Bienvenue dans votre nouvelles ligue !');
    }
}