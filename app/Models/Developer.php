<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillabe = [
        'name',
    ];

    public function games(){
        return $this->hasMany(Game::class);
    }
}
