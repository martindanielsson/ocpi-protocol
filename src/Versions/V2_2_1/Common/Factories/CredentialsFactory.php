<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Credentials;
use stdClass;

class CredentialsFactory
{
    public static function fromJson(?stdClass $json): ?Credentials
    {
        if ($json === null) {
            return null;
        }

        $credentials = new Credentials(
            $json->token,
            $json->url
        );

        foreach ($json->roles ?? [] as $role) {
            $credentials->addRole(CredentialsRoleFactory::fromJson($role));
        }

        return $credentials;
    }
}
