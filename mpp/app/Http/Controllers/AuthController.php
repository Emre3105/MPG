<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
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

    public function adminindex()
    {
        if (auth()->check()) { //a user is logged in
            return redirect()->route('home.index');
        }
        return view('auth.adminlogin');
    }  
      
    public function login(Request $request)
    {   
        $credentials = $request->only('username', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('home.index')
                        ->withSuccess('Signed in');
        }
        return redirect()->route('auth.login.index')->withErrors(['incorrect' => 'Désolé, votre mot de passe est incorrect.']);
    }

    public function adminlogin(Request $request)
    {   
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index')
                        ->withSuccess('Signed in');
        }
        return redirect()->route('auth.adminlogin.index')->withErrors(['incorrect' => 'Désolé, votre mot de passe est incorrect.']);
    }

    public function create()
    {
        if (auth()->check()) { //a user is logged in
            return redirect()->route('home.index');
        }
        return view('auth.register', ['url' => 'user']);
    }

    public function admincreate()
    {
        if (auth()->check()) { //a user is logged in
            return redirect()->route('admin.index');
        }
        return view('auth.register', ['url' => 'admin']);
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

    public function adminstore(UserRequest $request)
    {
        $data = $request->all();
        $check = Admin::create([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password'))
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index')
                        ->withSuccess('Signed in');
        }

        return redirect()->route("admin.index")->withSuccess('You have signed-in');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login.index');
    }
}