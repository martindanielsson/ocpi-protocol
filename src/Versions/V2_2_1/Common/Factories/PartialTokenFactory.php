<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialToken;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ProfileType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\TokenType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\WhitelistType;
use DateTime;
use stdClass;

class PartialTokenFactory
{
    public static function fromJson(?stdClass $json): ?PartialToken
    {
        if ($json === null) {
            return null;
        }

        $partialToken = new PartialToken();

        if (isset($json->country_code)) {
            $partialToken->withCountryCode($json->country_code);
        }
        if (isset($json->party_id)) {
            $partialToken->withPartyId($json->party_id);
        }
        if (isset($json->uid)) {
            $partialToken->withUid($json->uid);
        }
        if (isset($json->type)) {
            $partialToken->withType(new TokenType($json->type));
        }
        if (isset($json->contract_id)) {
            $partialToken->withContractId($json->contract_id);
        }
        if (isset($json->visual_number)) {
            $partialToken->withVisualNumber($json->visual_number);
        }
        if (isset($json->issuer)) {
            $partialToken->withIssuer($json->issuer);
        }
        if (isset($json->group_id)) {
            $partialToken->withGroupId($json->group_id);
        }
        if (isset($json->valid)) {
            $partialToken->withValid($json->valid);
        }
        if (isset($json->whitelist)) {
            $partialToken->withWhitelist(new WhitelistType($json->whitelist));
        }
        if (isset($json->language)) {
            $partialToken->withLanguage($json->language);
        }
        if (isset($json->default_profile_type)) {
            $partialToken->withDefaultProfileType(new ProfileType($json->default_profile_type));
        }
        if (isset($json->energy_contract)) {
            $partialToken->withEnergyContract(EnergyContractFactory::fromJson($json->energy_contract));
        }
        if (isset($json->language)) {
            $partialToken->withLastUpdated(new DateTime($json->last_updated));
        }

        return $partialToken;
    }
}