<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'game_reviews';
    protected $fillable = [
        'user_id',
        'game_id',
        'rating',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
