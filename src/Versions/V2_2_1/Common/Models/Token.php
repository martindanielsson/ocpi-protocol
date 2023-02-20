<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Token implements JsonSerializable
{
    private string $uid;

    private TokenType $type;

    private string $contractId;

    private ?string $visualNumber;

    private string $issuer;

    private bool $valid;

    private WhiteList $whiteList;

    private ?string $language;

    private DateTime $lastUpdated;

    private string $countryCode;

    private string $partyId;

    private ?string $groupId;

    private ?ProfileType $defaultProfileType;

    private ?EnergyContract $energyContract;

    public function __construct(
        string    $uid,
        TokenType $type,
        string    $contractId,
        ?string   $visualNumber,
        string    $issuer,
        bool      $valid,
        WhiteList $whiteList,
        ?string   $language,
        DateTime  $lastUpdated,
        string    $countryCode,
        string    $partyId,
        ?string   $groupId,
        ?ProfileType $defaultProfileType,
        ?EnergyContract $energyContract
    ) {
        $this->uid = $uid;
        $this->type = $type;
        $this->contractId = $contractId;
        $this->visualNumber = $visualNumber;
        $this->issuer = $issuer;
        $this->valid = $valid;
        $this->whiteList = $whiteList;
        $this->language = $language;
        $this->lastUpdated = $lastUpdated;
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->groupId = $groupId;
        $this->defaultProfileType = $defaultProfileType;
        $this->energyContract = $energyContract;
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

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getWhiteList(): WhiteList
    {
        return $this->whiteList;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'uid' => $this->uid,
            'type' => $this->type,
            'auth_id' => $this->contractId,
            'issuer' => $this->issuer,
            'valid' => $this->valid,
            'whitelist' => $this->whiteList,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated),
            'country_code' => $this->countryCode,
            'party_id' => $this->partyId
        ];

        if ($this->energyContract !== null) {
            $return['energy_contract'] = $this->energyContract;
        }

        if ($this->defaultProfileType !== null) {
            $return['default_profile_type'] = $this->defaultProfileType;
        }

        if ($this->groupId !== null) {
            $return['group_id'] = $this->groupId;
        }

        if ($this->visualNumber !== null) {
            $return['visual_number'] = $this->visualNumber;
        }

        if ($this->language !== null) {
            $return['language'] = $this->language;
        }

        return $return;
    }

    /**
     * @return ProfileType|null
     */
    public function getDefaultProfileType(): ?ProfileType
    {
        return $this->defaultProfileType;
    }

    /**
     * @return EnergyContract|null
     */
    public function getEnergyContract(): ?EnergyContract
    {
        return $this->energyContract;
    }
}
