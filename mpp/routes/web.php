<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// https://laravel.com/docs/9.x/controllers
// index (get), create (get), store (post), show (get), edit (get), update (put), destroy (delete)
Route::get('/', function () {
    if (auth()->check()) { //a user is logged in
        return redirect()->route('dashboard');
    }
    return view('accueil');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('connexion', [AuthController::class, 'index'])->name('auth.login.index');
Route::post('connexion', [AuthController::class, 'login'])->name('auth.login');
Route::get('inscription', [AuthController::class, 'create'])->name('auth.register.index');
Route::post('inscription', [AuthController::class, 'store'])->name('auth.register');
Route::get('deconnexion', [AuthController::class, 'logout'])->name('auth.logout');