<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\BasketballerController;

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
// index (get), browse (post), create (get), store (post), show (get), edit (get), update (put), destroy (delete)
Route::get('/', function () {
    if (auth()->check()) { //a user is logged in
        return redirect()->route('home.index');
    }
    return view('welcome');
})->name('welcome');

Route::get('/template', function () {
    return view('template');
});

Route::get('connexion', [AuthController::class, 'index'])->name('auth.login.index');
Route::post('connexion', [AuthController::class, 'login'])->name('auth.login');
Route::get('inscription', [AuthController::class, 'create'])->name('auth.register.index');
Route::post('inscription', [AuthController::class, 'store'])->name('auth.register');
Route::get('deconnexion', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('accueil', function() {
    return view('home');
})->name('home.index')->middleware('auth');

Route::group(['prefix' => 'ligues',  'middleware' => 'auth'], function()
{
    Route::get('/', [LeagueController::class, 'browse'])->name('league.browse');
    Route::post('favori', [LeagueController::class, 'favorite'])->name('league.favorite');
    Route::get('rejoindre/{code}', [LeagueController::class, 'join'])->name('league.join');
    Route::post('creer', [LeagueController::class, 'store'])->name('league.store');
    Route::get('/{code}', [LeagueController::class, 'show'])->name('league.show');
    Route::post('/{id}/joueurs', [LeagueController::class, 'browsePlayers'])->name('league.player.browse');
});

Route::group(['prefix' => 'joueurs'], function()
{
    Route::get('/', [BasketballerController::class, 'index'])->name('basketballer.index');
    Route::post('/', [BasketballerController::class, 'browse'])->name('basketballer.browse');
    // Route::post('rejoindre/{code}', [LeagueController::class, 'join'])->name('league.join');
    // Route::post('creer', [LeagueController::class, 'store'])->name('league.store');
});