<?php

namespace App\Services\Auth;

use App\Services\Common\DTO\Token\TokenDTO;

interface ProviderAuthService
{
    public function getAuthUrl(): string;

    public function getToken(string $code): TokenDTO;
}