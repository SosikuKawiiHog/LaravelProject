<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use Illuminate\Http\Request;

class DeveloperControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Developer::all());
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
        $devloper = Developer::with('games')->findOrFail($id);
        foreach($devloper->games as $game){
            $game->user_score = $game->reviews()->avg('rating');
        }
        return response($devloper);
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
