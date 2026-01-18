<?php

namespace App\Services\Common\DTO\Token;

use App\Services\Common\DTO\User\UserDTO;

class TokenDTO
{
    private string $accessToken;
    private string $refreshToken;
    private int $expiresIn;

    private UserDTO $userDTO;

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

    public function getUserDTO(): UserDTO
    {
        return $this->userDTO;
    }

    public function setUserDTO(UserDTO $userDTO): self
    {
        $this->userDTO = $userDTO;
        return $this;
    }
}