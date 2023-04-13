<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\AllowedType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\AuthorizationInfo;
use stdClass;

class AuthorizationInfoFactory
{
    public static function fromJson(?stdClass $json): ?AuthorizationInfo
    {
        if ($json === null) {
            return null;
        }

        return new AuthorizationInfo(
            new AllowedType($json->allowed),
            TokenFactory::fromJson($json->token),
            LocationReferencesFactory::fromJson($json->location),
            $json->authorization_reference ?? null,
            DisplayTextFactory::fromJson($json->info)
        );
    }
}
