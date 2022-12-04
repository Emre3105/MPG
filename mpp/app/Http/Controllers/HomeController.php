<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\League;

class AuthController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $leagues = League::where('admin_id', $userId)
            ->orderBy('status', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home', ['leagues' => $leagues]);
    }
}