<?php

namespace App\Services\Common\DTO\Strava;

final class StravaActivityDTO
{
    private string $provider = 'strava';
    private int $externalId;
    private float $distance;
    private string $startDate;

    public static function fromArray(array $data): self
    {
        return (new self())
            ->setExternalId($data['id'])
            ->setDistance($data['distance'])
            ->setStartDate($data['start_date']);
    }

    public function getId(): int
    {
        return $this->externalId;
    }

    private function setExternalId(int $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    private function setDistance(float $distance): self
    {
        $this->distance = $distance;
        return $this;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    private function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getProvider(): string
    {
        return $this->provider;
    }
}
