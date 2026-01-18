<?php

namespace App\Services\Common\DTO\Strava;

class StravaAthleteDTO
{
    private int $id;
    private string $username;
    private string $firstName;
    private string $lastName;

    private string $profile;

    public static function fromArray(array $data): self
    {
        return (new self())
            ->setId($data['id'])
            ->setUsername($data['username'])
            ->setFirstName($data['firstname'])
            ->setLastName($data['lastname'])
            ->setProfile($data['profile']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getProfile(): string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;
        return $this;
    }
}