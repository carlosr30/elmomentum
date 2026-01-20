<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\API\v1\UserActivity\UserActivityService;
use Illuminate\Http\Resources\Json\JsonResource;

class UserActivityController extends Controller
{
    public function __construct(private UserActivityService $userActivityService)
    {
    }

    public function index(User $user)
    {
        return JsonResource::collection(
            $this->userActivityService->getUserActivities($user)
        );
    }
}
