<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\CredentialsRoleFactory;
use JsonSerializable;
use stdClass;

class Credentials implements JsonSerializable
{
    private string $token;

    private string $url;

    /**
     * @var CredentialsRole[]
     */
    private array $roles;

    /**
     * @param string $token
     * @param string $url
     * @param stdClass|null $roles
     */
    public function __construct(string $token, string $url, ?stdClass $roles)
    {
        $this->token = $token;
        $this->url = $url;
        $this->roles = CredentialsRoleFactory::fromJson($roles);
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function jsonSerialize(): array
    {
        return [
            'token' => $this->token,
            'url' => $this->url,
            'roles' => $this->roles,
        ];
    }

    /**
     * @return CredentialsRole[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
}
