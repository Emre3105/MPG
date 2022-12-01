<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;

class LeagueController extends Controller
{
    public function showPlayers()
    {
        $players = League::find(1)->players;
        return $players;
    }
}
