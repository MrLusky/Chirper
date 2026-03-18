<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

/*Notas: o / significa a homepage (primeira coisa que vê quando acessa), e se comparado ao que tava antes, eu só deixei mais limpo:

Route::get('/', function () {
    return view('home');
}

Isso era o que tava antes
*/
Route::get('/', [ChirpController::class, 'index']);
