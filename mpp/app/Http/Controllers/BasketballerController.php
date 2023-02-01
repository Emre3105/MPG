<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basketballer;
use App\Http\Requests\BasketballersRequest;
use Illuminate\Support\Facades\DB;

class BasketballerController extends Controller
{
    public function index() {
        return view('basketballers');
    }

    public function browse(Request $request) {
        if (!isset($request->column)) {
            $request->column = "odds";
        }
        if (!isset($request->direction)) {
            $request->direction = "desc";
        }
        if (
            in_array($request->column, ["name", "team", "position", "odds"]) &&
            ($request->direction == "asc" || $request->direction == "desc")
        ) {
            if (isset($request->filter) && $request->filter != "") {
                return Basketballer::where('name','LIKE','%'.$request->filter.'%')
                    ->orWhere('team','LIKE','%'.$request->filter.'%')
                    ->orWhere('position','LIKE','%'.$request->filter.'%')
                    ->orderBy($request->column, $request->direction)
                    ->get();
            }
            return Basketballer::orderBy($request->column, $request->direction)->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }

    public function store(BasketballersRequest $request) {
        foreach($request["basketballers"] as $basketballer){
            Basketballer::updateOrCreate(
            [
                'name' => $basketballer['name'],
            ],
            [
                'team' => $basketballer['team'],
                'position' => $basketballer['position'],
                'odds' => $basketballer['odds'],
                'status' => $basketballer['status']
            ]);
        }
        return redirect()->back()->with('success', 'Les joueurs ont bien été ajoutés.');
    }
}