<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class GameControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $games = Game::with('developer')->limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))->get();

        foreach ($games as $game) {
            $game->user_score = $game->reviews()->avg('rating');
        }


        return response($games);
    }

    public function total(){
        return response(Game::all()->count());
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
    public function show(Request $request,string $id)
    {
        $game = Game::with(['developer'])->findOrFail($id);

        $globalAvg = $game->reviews()->avg('rating');

        $game->user_score = $globalAvg;

        $perPage = $request->input('perpage',5);
        $page = $request->input('page',0);

        $reviews = $game->reviews()
            ->with('user')
            ->limit($perPage)
            ->offset($page*$perPage)
            ->get();

        $game->reviews = $reviews;

        return response($game);
    }

    public function totalReviews(string $id){
        return response(Game::with(['reviews'])->findOrFail($id)->reviews()->count());
    }
    public function showGenres(string $id){
        $game = Game::with('genres')->find($id);

        $total = $game->genres()->count();

        return response()->json([
            'game' => [
                'id' => $game->id,
                'title' => $game->title,
                'genres' => $game->genres
            ],
            'total' => $total
        ]);
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
