<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
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



Route::get('/reviews',[ReviewController::class,'index'])->name('reviews.index');

Route::get('/reviews/create',[ReviewController::class,'create'])->name('reviews.create')->middleware('auth');

Route::post('/reviews',[ReviewController::class,'store'])->name('reviews.store')->middleware('auth');

Route::get('/reviews/{id}/edit',[ReviewController::class,'edit'])->name('reviews.edit')->middleware('auth');

Route::put('/reviews/{id}',[ReviewController::class,'update'])->name('reviews.update')->middleware('auth');

Route::delete('/reviews/{id}',[ReviewController::class,'destroy'])->name('reviews.destroy')->middleware('auth');


Route::get('/login',[LoginController::class,'login'])->name('login');

Route::get('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::post('/auth',[LoginController::class,'authenticate'])->name('auth.authenticate');

Route::delete('/game/{id}',[GameController::class,'destroy'])->name('game.destroy')->middleware('auth');


Route::get('/error', function(){
    return view('error',['message' => session('message')]);
});
