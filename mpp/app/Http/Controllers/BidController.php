<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferMarket;
use App\Models\Bid;

class BidController extends Controller
{
    public function browse(Request $request) {
        $userId = Auth::user()->id;
        if (isset($request->league_id)) {
            $playerId = \App\Models\Player::where('user_id', $userId)->where('league_id', $request->league_id)->first()->id;
            return TransferMarket::where('player_id', $playerId)->first()->bids;
        }
        return TransferMarket::where('user_id', $userId)->first()->bids;
    }
}