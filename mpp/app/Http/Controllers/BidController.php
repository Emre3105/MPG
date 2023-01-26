<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferMarket;
use App\Models\Bid;
use App\Models\Player;

class BidController extends Controller
{
    public function browse(Request $request) {
        $userId = Auth::user()->id;
        if (isset($request->league_id)) {
            $playerId = Player::where('user_id', $userId)->where('league_id', $request->league_id)->first()->id;
            return TransferMarket::where('player_id', $playerId)->first()->bids;
        }
        return TransferMarket::where('user_id', $userId)->first()->bids;
    }

    public function save(Request $request) {
        if (isset($request->bids)) {
            $userId = Auth::user()->id;
            if (isset($request->league_id)) {
                $playerId = Player::where('user_id', $userId)->where('league_id', $request->league_id)->first()->id;
                $transferMarketId = TransferMarket::where('player_id', $playerId)->first()->id;
                Bid::where('transfer_market_id', $transferMarketId)->delete();
                foreach ($request->bids as $bid) {
                    Bid::create([
                        'transfer_market_id' => $transferMarketId,
                        'basketballer_id' => $bid["id"],
                        'price' => $bid["price"]
                    ]);
                }
            } else {
                $transferMarketId = TransferMarket::where('user_id', $userId)->first()->id;
                Bid::where('transfer_market_id', $transferMarketId)->delete();
                foreach ($request->bids as $bid) {
                    Bid::create([
                        'transfer_market_id' => $transferMarketId,
                        'basketballer_id' => $bid["id"],
                        'price' => $bid["price"]
                    ]);
                }
            }
        }
    }

    public function import(Request $request) {
        if(isset($request->league_id)) {
            $userId = Auth::user()->id;
            $playerId = Player::where('user_id', $userId)->where('league_id', $request->league_id)->first()->id;
            $transferMarketId = TransferMarket::where('player_id', $playerId)->first()->id;
            Bid::where('transfer_market_id', $transferMarketId)->delete();
            $bidsToImport = TransferMarket::where('user_id', $userId)->first()->bids;
            foreach ($bidsToImport as $bid) {
                Bid::create([
                    'transfer_market_id' => $transferMarketId,
                    'basketballer_id' => $bid["basketballer_id"],
                    'price' => $bid["price"]
                ]);
            }
            return TransferMarket::where('player_id', $playerId)->first()->bids;
        }
    }

    public function validateBids(Request $request) {
        if(isset($request->league_id)) {
            $userId = Auth::user()->id;
            $playerId = Player::where('user_id', $userId)->where('league_id', $request->league_id)->first()->id;
            $transferMarket = TransferMarket::where('player_id', $playerId)->first();
            $transferMarket->validated_at = date('Y-m-d H:i:s');
            $transferMarket->save();
        }
    }
}