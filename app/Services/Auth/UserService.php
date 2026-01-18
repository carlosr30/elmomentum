<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Common\DTO\Token\TokenDTO;

class UserService
{
    public function updateOrCreateUser(TokenDTO $tokenDTO): User
    {
        $userDto = $tokenDTO->getUserDTO();
        return User::updateOrCreate(
            [
                'provider' => $userDto->getProvider(),
                'external_id' => $userDto->getExternalId(),
            ],
            [
                'name' => $userDto->getName(),
                'avatar' => $userDto->getAvatar(),
                'provider_data' => json_encode([
                    'access_token' => $tokenDTO->getAccessToken(),
                    'refresh_token' => $tokenDTO->getRefreshToken(),
                    'expires_in' => $tokenDTO->getExpiresIn(),
                ])
            ]
        );
    }
}