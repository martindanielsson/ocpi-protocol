<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CdrToken;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\TokenType;

class CdrTokenFactory
{
    public static function fromJson($json): CdrToken
    {
        return new CdrToken($json->country_code, $json->party_id, $json->uid, new TokenType($json->type), $json->contract_id);
    }
}