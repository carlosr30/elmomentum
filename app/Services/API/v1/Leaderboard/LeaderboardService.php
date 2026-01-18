<?php

namespace App\Services\API\v1\Leaderboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class LeaderboardService
{
    public function getLeaderboard(): Collection
    {
        return User::leftJoin(
            'activities',
            'users.id',
            '=',
            'activities.user_id'
        )
            ->select(
                'users.id',
                'users.name',
                'users.avatar',
                DB::raw('COALESCE(SUM(activities.distance), 0) as total_distance')
            )
            ->groupBy('users.id', 'users.name', 'users.avatar')
            ->orderByDesc('total_distance')
            ->get();
    }
}