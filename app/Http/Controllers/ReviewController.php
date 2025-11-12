<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        //$reviews = Review::with('game')->where('user_id', auth()->id())->get();
        $reviews = Review::with('game')->where('user_id', 1)->get();
        return view('reviews.index', compact('reviews'));
    }
    public function create(Request $request)
    {
        $games = Game::all();
        var_dump(compact('games'));
        return view('reviews.create', compact('games'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|numeric|min:0|max:10',
        ],[
            'game_id.required' => 'Выберите игру',
            'game_id.exists' => 'Выбранная игра не существует',
            'rating.required' => 'Укажите рейтинг',
            'rating.numeric' => 'Должно быть число',
            'rating.min' => 'Не может быть меньше 0',
            'rating.max' => 'Не может быть больше 10',
        ]);

        //$existingReview = Review::where('user_id', auth()->id())->where('game_id', $validated['game_id'])->first();
        $existingReview = Review::where('user_id',1)->where('game_id', $validated['game_id'])->first();
        if($existingReview){
            return back()->withErrors([
                'game_id' => 'Вы уже оставили отзыв'
            ])->withInput();
        }

        Review::create([
            //'user_id' => auth()->id(),
            'user_id' => 1,
            'game_id' => $validated['game_id'],
            'rating' => $validated['rating'],
        ]);
        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно добавлен!');
    }
    public function edit(Request $request,$id){
        //$review = Review::where('user_id', auth()->id())->where('game_id', $id)->findOrFail($id);
        $review = Review::where('user_id',1)->findOrFail($id);
        $games = Game::all();
        return view('reviews.edit', compact('review', 'games'));
    }
    public function update(Request $request,$id){
        //$review = Review::where('user_id', auth()->id())->findOrFail($id);
        $review = Review::where('user_id', 1)->findOrFail($id);
        $validated = $request->validate([
            'rating' => 'required|numeric|min:0|max:10',
        ],[
            'rating.required' => 'Укажите рейтинг',
            'rating.numeric' => 'Рейтинг должен быть числом',
            'rating.min' => 'Рейтинг не может быть меньше 0',
            'rating.max' => 'Рейтинг не может быть больше 10'
        ]);

        $review->update([
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно обновлен!');
    }
    public function destroy(Request $request,$id){
        //$review = Review::where('user_id', auth()->id())->where('game_id', $id)->findOrFail($id);
        $review = Review::where('user_id',1)->findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Отзыв успешно удален!');
    }
}
