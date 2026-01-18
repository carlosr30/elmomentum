<?php

use App\Http\Controllers\LeaderboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/leaderboard', [LeaderboardController::class, 'index']);
});