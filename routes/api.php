<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameControllerApi;
use App\Http\Controllers\GenreControllerApi;
use App\Http\Controllers\ProfileControllerApi;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperControllerApi;
use App\Http\Controllers\ReviewControllerApi;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/game',[GameControllerApi::class, 'index']);
Route::get('/game/{id}',[GameControllerApi::class, 'show']);

Route::get('/developer',[DeveloperControllerApi::class, 'index']);
Route::get('/developer/{id}',[DeveloperControllerApi::class, 'show']);

Route::get('/genre/{id}',[GenreControllerApi::class,'show']);

Route::get('/game/{id}/genres',[GameControllerApi::class,'showGenres']);

Route::get('/game_total', [GameControllerApi::class, 'total']);

Route::get('/game_reviews_total/{id}', [GameControllerApi::class, 'totalReviews']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/reviews/{id}',[ReviewControllerApi::class, 'show']);
    Route::get('/reviews',[ReviewControllerApi::class, 'index']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/profile/{id}', [ProfileControllerApi::class, 'show']);
});
