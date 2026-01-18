<?php

namespace App\Services\Auth;

use App\Services\Auth\Strava\StravaAuthService;
use InvalidArgumentException;

class ProviderAuthFactory
{
    public static function create(string $provider): ProviderAuthService
    {
        return match ($provider) {
            'strava' => new StravaAuthService(),
            default => throw new InvalidArgumentException("Unsupported provider: {$provider}"),
        };
    }
}