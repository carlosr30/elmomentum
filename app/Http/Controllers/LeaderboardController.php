<?php

namespace App\Http\Controllers;

use App\Services\API\v1\Leaderboard\LeaderboardService;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaderboardController extends Controller
{
    public function __construct(private LeaderboardService $leaderboardService)
    {
    }

    public function index()
    {
        return JsonResource::collection(
            $this->leaderboardService->getLeaderboard()
        );
    }
}
