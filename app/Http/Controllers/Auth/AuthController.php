<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\ProviderAuthFactory;
use App\Services\Auth\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private UserService $userService,
        private ProviderAuthFactory $providerAuthFactory
    ) {
    }

    public function redirect(string $provider): RedirectResponse
    {
        $authService = $this->providerAuthFactory->create($provider);
        return redirect($authService->getAuthUrl());
    }

    public function callback(Request $request, string $provider)
    {
        $authService = $this->providerAuthFactory->create($provider);
        $token = $authService->getToken($request->input('code'));

        $user = $this->userService->updateOrCreateUser($token);

        return $user->createToken('web')->plainTextToken;
    }
}
