<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('accueil');
});

Route::get('/template', function () {
    return view('template');
});

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/register', [UserController::class, 'create'])->name('user.register.create');
Route::post('/register', [UserController::class, 'store'])->name('user.register.store');
