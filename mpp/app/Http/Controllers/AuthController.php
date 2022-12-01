<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return redirect()->route('auth.login.index')->withSuccess('Login details are not valid');
    }

    public function create()
    {
        return view('auth.register');
    }
      
    public function store(Request $request)
    {  
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login.index');
    }
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('accueil');
        }
  
        return redirect()->route('auth.login.index')->withSuccess('You are not allowed to access');
    }
}