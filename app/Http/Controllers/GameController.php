<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameScore;
use App\Models\GameVersion;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $queryStr = $request->query('search');

        $games = Game::withTrashed()
            ->with('user')
            ->where('title', 'like', '%' . $queryStr . '%')
            ->orWhere('description', 'like', '%' . $queryStr . '%')
            ->orWhereHas('user', function ($query) use ($queryStr) {
                $query->where('username', 'like', '%' . $queryStr . '%');
            })
            ->get();
        return view('admin.games', compact('games'));
    }

    public function show(string $slug)
    {
        $game = Game::withTrashed()->where('slug', $slug)->first();
        // dd($game);
        return view('admin.game', compact('game'));
    }

    public function destroy(string $slug)
    {
        $game = Game::where('slug', $slug)->first();
        $game->delete();
        return redirect('/games');
    }
}
