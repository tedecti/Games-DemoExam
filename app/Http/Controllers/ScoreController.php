<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameScore;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function deleteByGame(string $slug)
    {
        $game = Game::withTrashed()->where('slug', $slug)->first();
        foreach($game->game_version as $version){
            GameScore::where('game_version_id', $version->id)->delete();
        }
        return back();
    }
    public function deleteByUser(string $slug, string $id)
    {
        $game = Game::withTrashed()->where('slug', $slug)->first();
        foreach($game->game_version as $version){
            GameScore::where('game_version_id', $version->id)
            ->where('user_id', $id)
            ->delete();
        }
        return back();
    }
    public function deleteById(string $id)
    {
        $score = GameScore::find($id);
        $score->delete();
        return back();
    }
}
