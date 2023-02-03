<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\BasketballerController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\TransferMarketController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\LineUpController;
use App\Http\Controllers\GameController;

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
    if (Auth::guard('user')->check()) { //a user is logged in
        return redirect()->route('home.index');
    }
    if (Auth::guard('admin')->check()) { //an admin is logged in
        return redirect()->route('admin.index');
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

Route::group(['prefix' => 'admin'], function () {
        Route::get('connexion', [AuthController::class, 'adminindex'])->name('auth.adminlogin.index');
        Route::post('connexion', [AuthController::class, 'adminlogin'])->name('auth.adminlogin');
        Route::get('accueil', function() {
            return view('admin');
        })->name('admin.index')->middleware('auth:admin');

        Route::get('/', function () {
            return redirect()->route('admin.index');
        })->name('admin')->middleware('auth:admin');
});

Route::get('accueil', function() {
    return view('home');
})->name('home.index')->middleware('auth:user');

Route::group(['prefix' => 'ligues',  'middleware' => 'auth:user'], function()
{
    Route::get('/', [LeagueController::class, 'browse'])->name('league.browse');
    Route::post('favori', [LeagueController::class, 'favorite'])->name('league.favorite');
    Route::get('rejoindre/{code}', [LeagueController::class, 'join'])->name('league.join');
    Route::post('creer', [LeagueController::class, 'store'])->name('league.store');
    Route::get('/{code}', [LeagueController::class, 'show'])->name('league.show');
    Route::post('/{id}/joueurs/noms', [LeagueController::class, 'browsePlayerNames'])->name('league.player.name.browse');
    Route::post('/{id}/joueurs', [LeagueController::class, 'browsePlayerIdAndNames'])->name('league.player.browse');
    Route::get('/{id}/lancement', [LeagueController::class, 'launch'])->name('league.launch');
});

Route::group(['prefix' => 'joueurs'], function()
{
    Route::get('/', [BasketballerController::class, 'index'])->name('basketballer.index');
    Route::post('/', [BasketballerController::class, 'browse'])->name('basketballer.browse');
    Route::post('/effectif', [BasketballerController::class, 'browseBasketballerPlayer'])->name('basketballer.player.browse');
    Route::post('/indisponible', [BasketballerController::class, 'bought'])->name('basketballer.bought.browse');
    Route::post('/possede', [BasketballerController::class, 'boughtByPlayer'])->name('basketballer.bought.by.player.browse');
});

Route::group(['prefix' => 'mercato'], function()
{
    Route::get('/', [TransferMarketController::class, 'index'])->name('transfer_market.index');
});

Route::group(['prefix' => 'enchere'], function()
{
    Route::post('/', [BidController::class, 'browse'])->name('bid.browse');
    Route::post('/enregister', [BidController::class, 'save'])->name('bid.save');
    Route::post('/importer', [BidController::class, 'import'])->name('bid.import');
    Route::post('/valider', [BidController::class, 'validateBids'])->name('bid.validate');
});

Route::group(['prefix' => 'composition'], function()
{
    Route::post('/', [LineUpController::class, 'browse'])->name('lineup.browse');
    Route::post('/enregister', [LineUpController::class, 'save'])->name('lineup.save');
});

Route::post('matchs', [GameController::class, 'browse'])->name('game.browse');

Route::group(['prefix' => 'games'], function()
{
    Route::post('/', [GameController::class, 'getGames'])->name('game.get');
    Route::post('/{id}', [GameController::class, 'getBasketballers'])->name('game.basketballers');
    Route::post('/{id}/points', [GameController::class, 'getPoints'])->name('game.basketballer.points');
    Route::post('/{id1}/{id2}/{points1}/{points2}', [GameController::class, 'setPoints'])->name('game.setpoints');
}
);

Route::post('ajoutBasketteurs', [BasketballerController::class, 'store'])->name('basketballer.store');
Route::post('ajoutStats', [StatController::class, 'store'])->name('stat.store');
Route::post('ligues/{id}/currentGame', [LeagueController::class, 'currentGame'])->name('league.currentGame');
Route::post('ligues/{id}/incrementCurrentGame', [LeagueController::class, 'incrementCurrentGame'])->name('league.incrementCurrentGame');