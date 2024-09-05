<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class Credentials implements JsonSerializable
{
    private string $token;
    private string $url;
    /** @var CredentialsRole[] */
    private array $roles = [];

    public function __construct(
        string $token,
        string $url
    ) {
        $this->token = $token;
        $this->url = $url;
    }

    public function addRole(CredentialsRole $role): self
    {
        $this->roles[] = $role;
        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function jsonSerialize(): array
    {
        return [
            'token' => $this->token,
            'url' => $this->url,
            'roles' => $this->roles
        ];
    }
}
