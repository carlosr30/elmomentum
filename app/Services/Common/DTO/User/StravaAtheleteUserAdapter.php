<?php

namespace App\Services\Common\DTO\User;

use App\Services\Common\DTO\Strava\StravaAthleteDTO;

class StravaAtheleteUserAdapter implements UserDTOAdapter
{
    public function __construct(
        private StravaAthleteDTO $stravaAtheleteDTO,
    ) {
    }

    public function toUserDTO(): UserDTO
    {
        return (new UserDTO())
            ->setExternalId((string) $this->stravaAtheleteDTO->getId())
            ->setProvider('strava')
            ->setName($this->stravaAtheleteDTO->getFullName())
            ->setAvatar($this->stravaAtheleteDTO->getProfile())
        ;
    }
}