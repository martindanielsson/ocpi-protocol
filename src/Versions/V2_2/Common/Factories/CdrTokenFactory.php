<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\CdrToken;
use Chargemap\OCPI\Versions\V2_2\Common\Models\TokenType;
use stdClass;

class CdrTokenFactory
{
    public static function fromJson(?stdClass $json): ?CdrToken
    {
        if ($json === null) {
            return null;
        }

        return new CdrToken(
            $json->country_code,
            $json->party_id,
            $json->uid,
            new TokenType($json->type),
            $json->contract_id
        );
    }
}