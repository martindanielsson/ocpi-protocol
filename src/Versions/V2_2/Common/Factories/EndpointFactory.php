<?php
declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Endpoint;
use Chargemap\OCPI\Versions\V2_2\Common\Models\InterfaceRole;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ModuleId;
use stdClass;

class EndpointFactory
{
    public static function fromJson(?stdClass $json): ?Endpoint
    {
        if($json === null) {
            return null;
        }

        return new Endpoint(
            new ModuleId($json->identifier),
            $json->url,
            new InterfaceRole($json->role)
        );
    }
}