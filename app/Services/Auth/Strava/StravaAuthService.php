<?php

namespace App\Services\Auth\Strava;

use App\Services\Auth\ProviderAuthService;
use App\Services\Common\DTO\Strava\StravaAthleteDTO;
use App\Services\Common\DTO\Token\TokenDTO;
use App\Services\Common\DTO\User\StravaAtheleteUserAdapter;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class StravaAuthService implements ProviderAuthService
{
    public function getAuthUrl(): string
    {
        $query = http_build_query([
            'client_id' => config('services.strava.client_id'),
            'redirect_uri' => config('services.strava.redirect_url'),
            'response_type' => 'code',
            'scope' => 'read,activity:read_all',
            'approval_prompt' => 'auto',
        ]);

        return config('services.strava.authorize_url') . "?{$query}";
    }

    public function getToken(string $code): TokenDTO
    {
        $url = config('services.strava.token_url');
        $response = Http::post($url, [
            'client_id' => config('services.strava.client_id'),
            'client_secret' => config('services.strava.client_secret'),
            'code' => $code,
            'grant_type' => 'authorization_code',
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Something went wrong.');
        }

        $data = $response->json();

        $stravaAthlete = StravaAthleteDTO::fromArray($data['athlete']);
        $stravaAthleteUserAdapter = new StravaAtheleteUserAdapter(
            $stravaAthlete
        );

        return (new TokenDTO())
            ->setAccessToken($data['access_token'])
            ->setRefreshToken($data['refresh_token'])
            ->setExpiresIn($data['expires_in'])
            ->setUserDTO($stravaAthleteUserAdapter->toUserDTO());
    }

    public function refreshToken(string $refreshToken): TokenDTO
    {
        $url = config('services.strava.token_url');
        $response = Http::post($url, [
            'client_id' => config('services.strava.client_id'),
            'client_secret' => config('services.strava.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Something went wrong.');
        }

        $data = $response->json();

        $stravaAthlete = StravaAthleteDTO::fromArray($data['athlete']);
        $stravaAthleteUserAdapter = new StravaAtheleteUserAdapter(
            $stravaAthlete
        );

        return (new TokenDTO())
            ->setAccessToken($data['access_token'])
            ->setRefreshToken($data['refresh_token'])
            ->setExpiresIn($data['expires_in'])
            ->setUserDTO($stravaAthleteUserAdapter->toUserDTO());
    }
}