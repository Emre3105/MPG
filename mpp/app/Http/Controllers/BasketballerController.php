<?php

namespace App\Http\Controllers;

use App\Models\Basketballer;

class BasketballerController extends Controller
{
    public function index()
    {
        $basketballers = Basketballer::orderBy('odds', 'desc')->orderBy('name')->get();
        return view('basketballers', ['basketballers' => $basketballers]);
    }
}