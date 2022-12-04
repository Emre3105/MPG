<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\League;

class LeagueController extends Controller
{
    public function browse()
    {
        $userId = Auth::user()->id;

        $leagues = League::join('players', 'leagues.id', '=', 'players.league_id')
            ->join('users', 'players.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->orderBy('leagues.status', 'asc')
            ->orderBy('leagues.created_at', 'desc')
            ->get();

        $recommendableLeagues = League::whereNotIn('id', $leagues->pluck('league_id'))->get();
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
}