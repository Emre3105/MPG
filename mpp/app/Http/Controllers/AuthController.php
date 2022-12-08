<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) { //a user is logged in
            return redirect()->route('home.index');
        }
        return view('auth.login');
    }  
      
    public function login(Request $request)
    {   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index')
                        ->withSuccess('Signed in');
        }
        return redirect()->route('auth.login.index')->withErrors(['incorrect' => 'Désolé, votre mot de passe est incorrect.']);
    }

    public function create()
    {
        if (auth()->check()) { //a user is logged in
            return redirect()->route('home.index');
        }
        return view('auth.register');
    }
      
    public function store(UserRequest $request)
    {           
        $data = $request->all();
        $check = User::create([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password'))
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index')
                        ->withSuccess('Signed in');
        }

        return redirect()->route("home.index")->withSuccess('You have signed-in');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login.index');
    }
}