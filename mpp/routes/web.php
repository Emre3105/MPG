<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeagueController;
use App\Models\League;

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


Route::get('/', function () {
    $leagues = League::all();
    return view('accueil', ['leagues' => $leagues]);
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/league/players',[LeagueController::class, 'showPlayers'])->name('league.players');

Route::get('/leagues', [LeagueController::class, 'showLeagues'])->name('leagues');

