<?php

namespace App\Services\Sync;

use App\Models\User;
use App\Services\Auth\Strava\StravaAuthService;
use App\Services\Common\DTO\Strava\StravaActivityDTO;
use Illuminate\Support\Facades\Http;

class StravaClient
{
    private string $baseUrl;

    public function __construct(
        private StravaAuthService $authService
    ) {
        $this->baseUrl = config('services.strava.api_base_url');
    }

    /**
     * @param User $user
     * @return StravaActivityDTO[]
     */
    public function getActivities(User $user): array
    {
        $accessToken = json_decode($user->provider_data, true)['access_token'];
        $response = Http::baseUrl($this->baseUrl)
            ->withToken($accessToken)
            ->get("/athlete/activities");

        $data = $response->json();

        $activities = [];
        foreach ($data as $item) {
            $activities[] = StravaActivityDTO::fromArray($item);
        }

        return $activities;
    }
}