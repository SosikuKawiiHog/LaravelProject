<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'cover_image',
        'developer_id',
        'metascore',
        'user_score',
    ];

    protected $casts = [
        'release_date' => 'date',
        'metascore' => 'integer',
        'user_score' => 'decimal:1',
    ];

    public function developer(){
        return $this->belongsTo(Developer::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'game_genre');
    }
}
