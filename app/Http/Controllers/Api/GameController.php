<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameVersion;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::query();
        $size = $request->query('size', 3);
        $sortBy = $request->query('sortBy', 'title');
        $sortDir = $request->query('sortDir', 'asc');

        if ($sortBy == "title") {
            $games->orderBy('title', $sortDir);
        }
        if ($sortBy == "popular") {
            $games->withCount(
                'game_scores'
            )->orderBy('game_scores_count', $sortDir);
        }
        if ($sortBy == "uploaddate") {
            $games->withMax("game_version", "version")->orderBy("game_version_max_version", $sortDir);
        }
        $games = $games->paginate($size);

        return ["content" => $games->items()];
    }

    public function show(string $slug)
    {
        $game = Game::where('slug', $slug)->first();
    }
}
