<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'game_id',
        'version',
        'path',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function game_score()
    {
        return $this->hasMany(GameScore::class);
    }
}
