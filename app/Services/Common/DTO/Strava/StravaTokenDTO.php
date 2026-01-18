<?php

namespace App\Services\Common\DTO\Strava;

class StravaTokenDTO
{
    private string $accessToken;
    private string $refreshToken;
    private int $expiresIn;

    public static function fromArray(array $data): self
    {
        return (new self())
            ->setAccessToken($data['access_token'])
            ->setRefreshToken($data['refresh_token'])
            ->setExpiresIn($data['expires_in']);
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function setRefreshToken(string $refreshToken): self
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function setExpiresIn(int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }
}

