<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\BusinessDetailsFactory;
use JetBrains\PhpStorm\Internal\TentativeType;
use stdClass;

class CredentialsRole implements \JsonSerializable
{
    private Role $role;

    private BusinessDetails $businessDetails;

    private string $partyId;

    private string $countryCode;

    public function __construct(Role $role, stdClass $businessDetails, string $partyId, string $countryCode)
    {
        $this->role = $role;
        $this->businessDetails = BusinessDetailsFactory::fromJson($businessDetails);
        $this->partyId = $partyId;
        $this->countryCode = $countryCode;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @return BusinessDetails
     */
    public function getBusinessDetails(): BusinessDetails
    {
        return $this->businessDetails;
    }

    /**
     * @return string
     */
    public function getPartyId(): string
    {
        return $this->partyId;
    }

    /**
     * @return string
     */
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
            'country_code' => $this->countryCode,
        ];
    }
}