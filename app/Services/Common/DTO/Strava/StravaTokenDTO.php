<?php

namespace App\Services\Common\DTO\Strava;

final class StravaTokenDTO
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

    private function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    private function setRefreshToken(string $refreshToken): self
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    private function setExpiresIn(int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }
}

