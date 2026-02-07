<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameControllerApi;
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

//Route::get('/reviews',[ReviewControllerApi::class, 'index']);
//Route::get('/reviews/{id}',[ReviewControllerApi::class, 'show']);


Route::middleware(['auth:sanctum'])->get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/reviews',[ReviewControllerApi::class, 'index']);
    Route::get('/reviews/{id}',[ReviewControllerApi::class, 'show']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
