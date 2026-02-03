<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::withAvg('reviews','rating')->get();

        //ДА ЧЁ НЕТ ТО
        foreach ($games as $game) {
            $game->user_score = $game->reviews_avg_rating;
        }

//        $games->each(function ($game) {
//            $game->user_score = $game->reviews_avg_score;
//        });
        return response($games);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::with('reviews')->findOrFail($id);
        $average = $game->reviews->avg('rating');
        $game->user_score = $average;
        return response($game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
