<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Models\BaseEndpoint;
use JsonSerializable;

class Endpoint extends BaseEndpoint implements JsonSerializable
{
    private ModuleId $moduleId;

    private string $url;

    private InterfaceRole $role;

    public function __construct(ModuleId $moduleId, string $url, InterfaceRole $role)
    {
        $this->moduleId = $moduleId;
        $this->url = $url;
        $this->role = $role;
    }

    public function getModuleId(): ModuleId
    {
        return $this->moduleId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function jsonSerialize(): array
    {
        return [
            'identifier' => $this->moduleId,
            'url' => $this->url,
            'role' => $this->role,
        ];
    }

    /**
     * @return InterfaceRole
     */
    public function getRole(): InterfaceRole
    {
        return $this->role;
    }
}