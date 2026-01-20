<?php

namespace App\Services\API\v1\UserActivity;

use App\Models\User;

class UserActivityService
{
    public function getUserActivities(User $user)
    {
        return $user->activities()->get();
    }
}