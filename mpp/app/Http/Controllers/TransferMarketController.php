<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Basketballer;

class TransferMarketController extends Controller
{
    public function index() {
        return view('transfer_market');
    }

    // public function browse(Request $request) {
    //     if (!isset($request->column)) {
    //         $request->column = "odds";
    //     }
    //     if (!isset($request->direction)) {
    //         $request->direction = "desc";
    //     }
    //     if (
    //         in_array($request->column, ["name", "team", "position", "odds"]) &&
    //         ($request->direction == "asc" || $request->direction == "desc")
    //     ) {
    //         if (isset($request->filter) && $request->filter != "") {
    //             return Basketballer::where('name','LIKE','%'.$request->filter.'%')
    //                 ->orWhere('team','LIKE','%'.$request->filter.'%')
    //                 ->orWhere('position','LIKE','%'.$request->filter.'%')
    //                 ->orderBy($request->column, $request->direction)
    //                 ->get();
    //         }
    //         return Basketballer::orderBy($request->column, $request->direction)->get();
    //     }
    //     return redirect()->back()->with('error', 'Une erreur est survenue.');
    // }
}