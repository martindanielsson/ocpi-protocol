<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class CredentialsRole implements JsonSerializable
{
    private Role $role;
    private BusinessDetails $businessDetails;
    private string $partyId;
    private string $countryCode;

    public function __construct(
        Role $role,
        BusinessDetails $businessDetails,
        string $partyId,
        string $countryCode
    ) {
        $this->role = $role;
        $this->businessDetails = $businessDetails;
        $this->partyId = $partyId;
        $this->countryCode = $countryCode;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getBusinessDetails(): BusinessDetails
    {
        return $this->businessDetails;
    }

    public function getPartyId(): string
    {
        return $this->partyId;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function jsonSerialize(): array
    {
        return [
            'role' => $this->role,
            'business_details' => $this->businessDetails,
            'party_id' => $this->partyId,
            'country_code' => $this->countryCode
        ];
    }
}