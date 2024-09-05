<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Token implements JsonSerializable
{
    private string $countryCode;
    private string $partyId;
    private string $uid;
    private TokenType $type;
    private string $contractId;
    private ?string $visualNumber;
    private string $issuer;
    private ?string $groupId;
    private bool $valid;
    private WhitelistType $whitelist;
    private ?string $language;
    private ?ProfileType $defaultProfileType;
    private ?EnergyContract $energyContract;
    private DateTime $lastUpdated;

    public function __construct(
        string $countryCode,
        string $partyId,
        string $uid,
        TokenType $type,
        string $contractId,
        ?string $visualNumber,
        string $issuer,
        ?string $groupId,
        bool $valid,
        WhitelistType $whitelist,
        ?string $language,
        ?ProfileType $defaultProfileType,
        ?EnergyContract $energyContract,
        DateTime $lastUpdated
    ) {
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->uid = $uid;
        $this->type = $type;
        $this->contractId = $contractId;
        $this->visualNumber = $visualNumber;
        $this->issuer = $issuer;
        $this->groupId = $groupId;
        $this->valid = $valid;
        $this->whitelist = $whitelist;
        $this->language = $language;
        $this->defaultProfileType = $defaultProfileType;
        $this->energyContract = $energyContract;
        $this->lastUpdated = $lastUpdated;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPartyId(): string
    {
        return $this->partyId;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getType(): TokenType
    {
        return $this->type;
    }

    public function getContractId(): string
    {
        return $this->contractId;
    }

    public function getVisualNumber(): ?string
    {
        return $this->visualNumber;
    }

    public function getIssuer(): string
    {
        return $this->issuer;
    }

    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    public function getValid(): bool
    {
        return $this->valid;
    }

    public function getWhitelist(): WhitelistType
    {
        return $this->whitelist;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getDefaultProfileType(): ?ProfileType
    {
        return $this->defaultProfileType;
    }

    public function getEnergyContract(): ?EnergyContract
    {
        return $this->energyContract;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        return [
            'country_code' => $this->countryCode,
            'party_id' => $this->partyId,
            'uid' => $this->uid,
            'type' => $this->type,
            'contract_id' => $this->contractId,
            'visual_number' => $this->visualNumber,
            'issuer' => $this->issuer,
            'group_id' => $this->groupId,
            'valid' => $this->valid,
            'whitelist' => $this->whitelist,
            'language' => $this->language,
            'default_profile_type' => $this->defaultProfileType,
            'energy_contract' => $this->energyContract,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }
}
