<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

/**
 * @method bool hasId()
 * TODO: Put down other methods
 * @method self withId(?string $id)
 * TODO: Put down other methods
 */
class PartialToken implements JsonSerializable
{
    private ?string $countryCode = null;
    private ?string $partyId = null;
    private ?string $uid = null;
    private ?TokenType $type = null;
    private ?string $contractId = null;
    private ?string $visualNumber = null;
    private ?string $issuer = null;
    private ?string $groupId = null;
    private ?bool $valid = null;
    private ?WhitelistType $whitelist = null;
    private ?string $language = null;
    private ?ProfileType $defaultProfileType = null;
    private ?EnergyContract $energyContract = null;
    private ?DateTime $lastUpdated = null;

    protected function _withCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    protected function _withPartyId(?string $partyId): self
    {
        $this->partyId = $partyId;
        return $this;
    }

    protected function _withUid(?string $uid): self
    {
        $this->uid = $uid;
        return $this;
    }

    protected function _withType(?TokenType $type): self
    {
        $this->type = $type;
        return $this;
    }

    protected function _withContractId(?string $contractId): self
    {
        $this->contractId = $contractId;
        return $this;
    }

    protected function _withVisualNumber(?string $visualNumber): self
    {
        $this->visualNumber = $visualNumber;
        return $this;
    }

    protected function _withIssuer(?string $issuer): self
    {
        $this->issuer = $issuer;
        return $this;
    }

    protected function _withGroupId(?string $groupId): self
    {
        $this->groupId = $groupId;
        return $this;
    }

    protected function _withValid(?bool $valid): self
    {
        $this->valid = $valid;
        return $this;
    }

    protected function _withWhitelist(?WhitelistType $whitelist): self
    {
        $this->whitelist = $whitelist;
        return $this;
    }

    protected function _withLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    protected function _withDefaultProfileType(?ProfileType $defaultProfileType): self
    {
        $this->defaultProfileType = $defaultProfileType;
        return $this;
    }

    protected function _withEnergyContract(?EnergyContract $energyContract): self
    {
        $this->energyContract = $energyContract;
        return $this;
    }

    protected function _withLastUpdated(?DateTime $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function getPartyId(): ?string
    {
        return $this->partyId;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function getType(): ?TokenType
    {
        return $this->type;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getVisualNumber(): ?string
    {
        return $this->visualNumber;
    }

    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    public function getValid(): ?bool
    {
        return $this->valid;
    }

    public function getWhitelist(): ?WhitelistType
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

    public function getLastUpdated(): ?DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [];

        if ($this->hasCountryCode()) {
            $return['country_code'] = $this->countryCode;
        }
        if ($this->hasPartyId()) {
            $return['party_id'] = $this->partyId;
        }
        if ($this->hasUid()) {
            $return['uid'] = $this->uid;
        }
        if ($this->hasType()) {
            $return['type'] = $this->type;
        }
        if ($this->hasContractId()) {
            $return['contract_id'] = $this->contractId;
        }
        if ($this->hasVisualNumber()) {
            $return['visual_number'] = $this->visualNumber;
        }
        if ($this->hasIssuer()) {
            $return['issuer'] = $this->issuer;
        }
        if ($this->hasGroupId()) {
            $return['group_id'] = $this->groupId;
        }
        if ($this->hasValid()) {
            $return['valid'] = $this->valid;
        }
        if ($this->hasWhitelist()) {
            $return['whitelist'] = $this->whitelist;
        }
        if ($this->hasLanguage()) {
            $return['language'] = $this->language;
        }
        if ($this->hasDefaultProfileType()) {
            $return['default_profile_type'] = $this->defaultProfileType;
        }
        if ($this->hasEnergyContract()) {
            $return['energy_contract'] = $this->energyContract;
        }
        if ($this->hasLastUpdated()) {
            $return['last_updated'] = DateTimeFormatter::format($this->lastUpdated);
        }

        return $return;
    }
}
