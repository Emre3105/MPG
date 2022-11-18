<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create() {
        return view('register');
    }

    public function store(Request $request) {
        //$this->users = $users;
        $user = User::create($request->all());
        return response()->json($user);
    }
}
