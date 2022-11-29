<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;

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
    return view('accueil');
});

Route::get('/template', function () {
    return view('template');
});

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/login', [UserController::class, 'index'])->name('user.login.index');

// Route::get('/register', [UserController::class, 'create'])->name('user.register.create');
// Route::post('/register', [UserController::class, 'store'])->name('user.register.store');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');