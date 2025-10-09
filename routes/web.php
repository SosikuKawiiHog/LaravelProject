<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", function () {
    return view('hello', ['title' => 'Hello lepricons!']);
});

Route::get('/developer',[DeveloperController::class,'index']);


Route::get('/developer/{id}',[DeveloperController::class,'show']);

Route::get('/game', [GameController::class,'index']);

Route::get('/game/{id}',[GameController::class,'show']);

Route::get('genre/{id}',[GenreController::class,'show']);

Route::get('/game/{id}/genres',[GameController::class,'showGenres'])->name('game.genre');
