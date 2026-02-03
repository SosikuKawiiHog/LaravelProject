<?php

use App\Http\Controllers\GameControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperControllerApi;
use App\Http\Controllers\ReviewControllerApi;


Route::get('/game',[GameControllerApi::class, 'index']);
Route::get('/game/{id}',[GameControllerApi::class, 'show']);

Route::get('/developer',[DeveloperControllerApi::class, 'index']);
Route::get('/developer/{id}',[DeveloperControllerApi::class, 'show']);

Route::get('/reviews',[ReviewControllerApi::class, 'index']);
Route::get('/reviews/{id}',[ReviewControllerApi::class, 'show']);
