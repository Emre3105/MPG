<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\League;

class HomeController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $leagues = League::join('players', 'leagues.id', '=', 'players.league_id')
            ->join('users', 'players.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->orderBy('leagues.status', 'asc')
            ->orderBy('leagues.created_at', 'desc')
            ->get();
        return view('home', ['leagues' => $leagues]);
    }
}