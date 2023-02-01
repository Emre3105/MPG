<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stat;
use App\Http\Requests\StatsRequest;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function store(StatsRequest $request) {
        DB::table('stats')->truncate();
        foreach($request["statistics"] as $stat){
            Stat::updateOrCreate(
            [
                'basketballer_name' => $stat['basketballer_name'],
                'date' => $stat['date'],
            ],
            [
                'note' => $stat['note'],
                'points' => $stat['points'],
            ]);
        }
        return redirect()->back()->with('success', 'Les stats ont bien été ajoutées.');
    }
}