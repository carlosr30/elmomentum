<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeaderboardCollection;
use App\Http\Resources\LeaderboardEntryResource;
use App\Services\API\v1\Leaderboard\LeaderboardService;

class LeaderboardController extends Controller
{
    public function __construct(private LeaderboardService $leaderboardService)
    {
    }

    public function index()
    {
        return new LeaderboardCollection(
            LeaderboardEntryResource::collection(
                $this->leaderboardService->getLeaderboard()
            )
        );
    }
}
