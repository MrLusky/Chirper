<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Chirp;

/*Notas: o / significa a homepage (primeira coisa que vê quando acessa), e se comparado ao que tava antes, eu só deixei mais limpo:

Route::get('/', function () {
    return view('home');
}

Isso era o que tava antes
*/
Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
}); //Por tudo estar dentro desse negócio, eu não consigo fazer mais nada sem estar autenticado



//Rotas de Registro
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');

//Rota de Logout
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

//Rota de Login
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('login', Login::class)
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/chirps/{chirp}/like', [LikeController::class, 'store'])->name('chirps.like');
    Route::delete('/chirps/{chirp}/like', [LikeController::class, 'destroy'])->name('chirps.unlike');
});

Route::middleware('auth')->group(function () {
    Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/follow', [FollowController::class, 'unfollow'])->name('users.unfollow');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/explore', function () {
    $chirps = \App\Models\Chirp::with('user')->latest()->take(50)->get();
    return view('home', ['chirps' => $chirps]);
})->name('explore'); //isso aqui é basicamente, se eu tiver seguind 50 usuários ou X usuários tenham feito mais de 50 chirps, ele só vai mostrar 50 mesmo

