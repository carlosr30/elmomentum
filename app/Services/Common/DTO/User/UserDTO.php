<?php

namespace App\Services\Common\DTO\User;

class UserDTO
{
    private int $id;
    private string $name;
    private string $avatar;
    private string $provider;
    private string $providerData;

    private string $externalId;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getProvider(): string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;
        return $this;
    }

    public function getProviderData(): array
    {
        return json_decode($this->providerData, true);
    }

    public function getRawProviderData(): string
    {
        return $this->providerData;
    }

    public function setProviderData(array $providerData): self
    {
        $this->providerData = json_encode($providerData);
        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }
}
