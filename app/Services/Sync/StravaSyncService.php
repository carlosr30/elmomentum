<?php

namespace App\Services\Sync;

use App\Models\User;

class StravaSyncService
{
    public function __construct(private StravaClient $stravaClient)
    {
    }

    public function sync(User $user): void
    {
        $activities = $this->stravaClient->getActivities($user);
        foreach ($activities as $activityDto) {
            $user->activities()->updateOrCreate(
                [
                    'provider' => $activityDto->getProvider(),
                    'external_id' => $activityDto->getId()
                ],
                [
                    'name' => $activityDto->getStartDate(),
                    'distance' => $activityDto->getDistance(),
                ]
            );
        }
    }
}