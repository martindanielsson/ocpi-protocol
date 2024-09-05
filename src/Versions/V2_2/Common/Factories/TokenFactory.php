<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\ProfileType;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Token;
use Chargemap\OCPI\Versions\V2_2\Common\Models\TokenType;
use Chargemap\OCPI\Versions\V2_2\Common\Models\WhitelistType;
use DateTime;
use stdClass;

class TokenFactory
{
    public static function fromJson(?stdClass $json): ?Token
    {
        if ($json === null) {
            return null;
        }

        return new Token(
            $json->country_code,
            $json->party_id,
            $json->uid,
            new TokenType($json->type),
            $json->contract_id,
            $json->visual_number ?? null,
            $json->issuer,
            $json->group_id ?? null,
            $json->valid,
            new WhitelistType($json->whitelist),
            $json->language ?? null,
            !empty($json->default_profile_type) ? new ProfileType($json->default_profile_type) : null,
            EnergyContractFactory::fromJson($json->energy_contract),
            new DateTime($json->last_updated)
        );
    }
}