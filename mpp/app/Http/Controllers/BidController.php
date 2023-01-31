<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TransferMarket;
use App\Models\Bid;
use App\Models\Player;
use App\Models\League;
use App\Models\Basketballer;

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

            $transferMarkets = TransferMarket::whereIn("player_id", League::find($request->league_id)->players->pluck("id")->toArray())->get();
            $canDistributeBasketballers = true;
            foreach($transferMarkets as $transferMarket) {
                if($transferMarket->validated_at == null) {
                    $canDistributeBasketballers = false;
                }
            }
            if($canDistributeBasketballers) {
                $this->distributeBasketballers($transferMarkets);
                // on recuperer a nouveau les transferMarkets parce que les budget restants ont été modifiés
                $transferMarkets = TransferMarket::whereIn("player_id", League::find($request->league_id)->players->pluck("id")->toArray())->get();
                foreach($transferMarkets as $transferMarket) {
                    // empty bids
                    foreach($transferMarket->bids as $bid) {
                        $bid->delete();
                    }
                    // reset validated_at when needed
                    if($transferMarket->remaining_budget > 0) {
                        $transferMarket->validated_at = null;
                        $transferMarket->save();
                    }
                }
            }
        }
    }

    private function distributeBasketballers($transferMarkets) {
        $basketballerIds = Basketballer::pluck("id")->toArray();
        foreach($basketballerIds as $basketballerId) {
            $bestOffer = $this->getBestOffer($transferMarkets, $basketballerId);
            $transferMarket = $bestOffer[0];
            $price = $bestOffer[1];
            if($transferMarket != null) {
                DB::insert('insert into basketballers_players (basketballer_id, player_id, price) values (?, ?, ?)', [$basketballerId, $transferMarket->player_id, $price]);
                $transferMarket->remaining_budget = $transferMarket->remaining_budget - $price;
                $transferMarket->save();
            }
        }
    }

    private function getBestOffer($transferMarkets, $basketballerId) {
        $bestTransferMarket = null; // the player who made the best offer
        $bestPrice = -1;
        $bestDate = null;
        foreach($transferMarkets as $transferMarket) {
            $bid = $transferMarket->bids->where("basketballer_id", $basketballerId)->first();
            if ($bid && (
                // this player made a best offer
                $bid->price > $bestPrice ||
                // this player made same offer than then best but earlier
                $bid->price == $bestPrice && Carbon::parse($transferMarket->validated_at)->lt($bestDate)
            )) {
                $bestTransferMarket = $transferMarket;
                $bestPrice = $bid->price;
                $bestDate = Carbon::parse($transferMarket->validated_at);
            }
        }
        return [$bestTransferMarket, $bestPrice];
    }
}