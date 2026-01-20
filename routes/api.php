<?php

use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\UserActivityController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::get('/leaderboard', [LeaderboardController::class, 'index']);
    Route::get('/users/{user}/activities', [UserActivityController::class, 'index']);
});