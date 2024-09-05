<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\PartialToken;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ProfileType;
use Chargemap\OCPI\Versions\V2_2\Common\Models\TokenType;
use Chargemap\OCPI\Versions\V2_2\Common\Models\WhitelistType;
use DateTime;
use stdClass;

class PartialTokenFactory
{
    public static function fromJson(?stdClass $json): ?PartialToken
    {
        if ($json === null) {
            return null;
        }

        $token = new PartialToken();

        if (isset($json->country_code)) {
            $token->withCountryCode($json->country_code);
        }
        if (isset($json->party_id)) {
            $token->withPartyId($json->party_id);
        }
        if (isset($json->uid)) {
            $token->withUid($json->uid);
        }
        if (isset($json->type)) {
            $token->withType(new TokenType($json->type));
        }
        if (isset($json->contract_id)) {
            $token->withContractId($json->contract_id);
        }
        if (isset($json->visual_number)) {
            $token->withVisualNumber($json->visual_number);
        }
        if (isset($json->issuer)) {
            $token->withIssuer($json->issuer);
        }
        if (isset($json->group_id)) {
            $token->withGroupId($json->group_id);
        }
        if (isset($json->valid)) {
            $token->withValid($json->valid);
        }
        if (isset($json->whitelist)) {
            $token->withWhitelist(new WhitelistType($json->whitelist));
        }
        if (isset($json->language)) {
            $token->withLanguage($json->language);
        }
        if (isset($json->default_profile_type)) {
            $token->withDefaultProfileType(new ProfileType($json->default_profile_type));
        }
        if (isset($json->energy_contract)) {
            $token->withEnergyContract(EnergyContractFactory::fromJson($json->energy_contract));
        }
        if (isset($json->language)) {
            $token->withLastUpdated(new DateTime($json->last_updated));
        }

        return $token;
    }
}