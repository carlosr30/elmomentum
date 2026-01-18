<?php

namespace App\Services\Common\DTO\User;

interface UserDTOAdapter
{
    public function toUserDTO(): UserDTO;
}