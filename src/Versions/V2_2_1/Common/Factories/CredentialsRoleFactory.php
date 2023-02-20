<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CredentialsRole;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Role;
use stdClass;

class CredentialsRoleFactory
{
    public static function fromJson(?stdClass $json): array
    {
        $roles = [];

        foreach ($json as $role) {
            $roles[] = self::buildRole($role);
        }

        return $roles;
    }

    private static function buildRole(stdClass $json): CredentialsRole
    {
        return new CredentialsRole(
            new Role($json->role),
            BusinessDetailsFactory::fromJson($json->business_details),
            $json->party_id,
            $json->country_code
        );
    }
}