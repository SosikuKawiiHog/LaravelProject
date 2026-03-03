<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class ReviewControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Review::with('game')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-review')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление отзывов'
            ], 403);
        }

        try{
            Storage::disk('s3')->has('test');
        } catch (\Exception $e){
            return response()->json([
                'code' => 7,
                'message' => $e->getMessage(),
            ]);
        }

        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|numeric|min:0|max:10',
            'text' => 'nullable|string|max:2000',
            'screenshots' => 'nullable|array|max:3',
            'screenshots.*' => 'file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if(Review::where('user_id', auth()->id())->where('game_id', $validated['game_id'])->exists()){
            return response()->json([
                'code' => 1,
                'message' => 'Вы уже оставили отзыв на эту игру'
            ], 409);
        }

        $screenshots = [];
        if($request->hasFile('screenshots')){
            foreach($request->file('screenshots') as $index => $file){
                $fileName = 'review_' . auth()->id() . '_game_' . $validated['game_id'] . time() . '_' . $index . '.' . $file->extension();

                try{
                    $path = Storage::disk('s3')->putFileAs('review_screenshots', $file, $fileName);
                    $screenshots[] = Storage::disk('s3')->url($path);
                } catch(\Exception $e){
                    return response()->json([
                        'code' => 2,
                        'message' => 'Ошибка загрузки файла в хранилище S3',
                    ]);
                }
            }
        }
        $review = new Review($validated);
        $review->screenshots = $screenshots;
        $review->user_id = auth()->id();
        $review->save();
        return response()->json([
            'code' => 0,
            'message' => 'Отзыв успешно добавлен'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Review::with('game')->findOrFail($id));
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
