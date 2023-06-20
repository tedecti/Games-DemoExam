<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/signin', [AdminController::class, 'showLogin']);
Route::post('/signin', [AdminController::class, 'login'])->name('login');

Route::group(["middleware" => "admin"], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/games', [GameController::class, 'index'])->name('admin.games');
    Route::get('/game/{slug}', [GameController::class, 'show'])->name('admin.game');
    Route::delete('/game/{slug}', [GameController::class, 'destroy'])->name('game.destroy');
    
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/user/{username}', [UserController::class, 'show'])->name('admin.user');
    Route::post('/user/{username}/ban', [UserController::class, 'ban'])->name('admin.ban');
    
    Route::delete('/games/score/game/{slug}', [ScoreController::class, 'deleteByGame'])->name('scoreByGame.destroy');
    Route::delete('/games/score/{id}', [ScoreController::class, 'deleteById'])->name('scoreById.destroy');
    Route::delete('/games/score/game/{slug}/{id}', [ScoreController::class, 'deleteByUser'])->name('scoreByUser.destroy');
});