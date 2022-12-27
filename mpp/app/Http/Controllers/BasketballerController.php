<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basketballer;

class BasketballerController extends Controller
{
    public function index() {
        return view('basketballers');
    }

    public function browse(Request $request) {
        if (
            isset($request->column) && isset($request->direction) &&
            in_array($request->column, ["name", "team", "position", "odds"]) &&
            ($request->direction == "asc" || $request->direction == "desc")
        ) {
            return Basketballer::orderBy($request->column, $request->direction)->get();
        }
        return redirect()->back()->with('error', 'Une erreur est survenue.');
    }
}