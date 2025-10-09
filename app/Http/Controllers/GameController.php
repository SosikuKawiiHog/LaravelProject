<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('games',[
            'games' => Game::withAvg('reviews','rating')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $game = Game::with('reviews')->find($id);
        if($game && $game->reviews()->count() > 0){
            $averageRating = $game->reviews()->avg('rating');
            $game->user_score = $averageRating;
        }
        return view('game',[
            'game' => $game
        ]);
    }

    public function showGenres(string $id){
        $game = Game::with('genres')->find($id);
        $total = $game ? $game->genres()->count() : 0;
        return view('game_genres',[
            'game' => $game,
            'total' => $total
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
