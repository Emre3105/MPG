<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use App\Models\Basketballer;
use App\Models\LineUp;

class LineUpController extends Controller
{
    public function browse(Request $request) {
        if (isset($request->league_id)) {
            $userId = Auth::user()->id;
            $player = Player::where([
                'user_id' => Auth::user()->id,
                'league_id' => $request->league_id,
            ])->first();
            $lineUp = LineUp::where('player_id', $player->id)->first();
            return [
                "pointGuard" => Basketballer::find($lineUp->pointGuard),
                "shootingGuard" => Basketballer::find($lineUp->shootingGuard),
                "smallForward" => Basketballer::find($lineUp->smallForward),
                "powerForward" => Basketballer::find($lineUp->powerForward),
                "center" => Basketballer::find($lineUp->center),
            ];
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }

    public function save(Request $request) {
        if (isset($request->league_id)) {
            $userId = Auth::user()->id;
            $player = Player::where([
                'user_id' => Auth::user()->id,
                'league_id' => $request->league_id,
            ])->first();
            $lineUp = LineUp::where('player_id', $player->id)->update([
                "pointGuard" => $request->point_guard,
                "shootingGuard" => $request->shooting_guard,
                "smallForward" => $request->small_forward,
                "powerForward" => $request->power_forward,
                "center" => $request->center,
            ]);
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }
}