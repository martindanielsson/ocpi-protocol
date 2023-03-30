<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use Chargemap\OCPI\Common\Utils\PartialModel;
use DateTime;
use JsonSerializable;

/**
 * @method bool hasId()
 * TODO: Put down other methods
 * @method self withId(?string $id)
 * TODO: Put down other methods
 */
class PartialConnector extends PartialModel implements JsonSerializable
{
    private ?string $id = null;
    private ?ConnectorType $standard = null;
    private ?ConnectorFormat $format = null;
    private ?PowerType $powerType = null;
    private ?int $maxVoltage = null;
    private ?int $maxAmperage = null;
    private ?int $maxElectricPower = null;
    /** @var string[]|null */
    private ?array $tariffIds = null;
    private ?string $termsAndConditions = null;
    private ?DateTime $lastUpdated = null;

    protected function _withId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    protected function _withStandard(?ConnectorType $standard): self
    {
        $this->standard = $standard;
        return $this;
    }

    protected function _withFormat(?ConnectorFormat $format): self
    {
        $this->format = $format;
        return $this;
    }

    protected function _withPowerType(?PowerType $powerType): self
    {
        $this->powerType = $powerType;
        return $this;
    }

    protected function _withMaxVoltage(?int $maxVoltage): self
    {
        $this->maxVoltage = $maxVoltage;
        return $this;
    }

    protected function _withMaxAmperage(?int $maxAmperage): self
    {
        $this->maxAmperage = $maxAmperage;
        return $this;
    }

    protected function _withMaxElectricPower(?int $maxElectricPower): self
    {
        $this->maxElectricPower = $maxElectricPower;
        return $this;
    }

    protected function _withTariffIds(): self
    {
        $this->tariffIds = [];
        return $this;
    }

    public function addTariffId(string $tariffId): self
    {
        $this->tariffIds[] = $tariffId;
        return $this;
    }

    protected function _withTermsAndConditions(?string $termsAndConditions): self
    {
        $this->termsAndConditions = $termsAndConditions;
        return $this;
    }

    protected function _withLastUpdated(?DateTime $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getStandard(): ?ConnectorType
    {
        return $this->standard;
    }

    public function getformat(): ?ConnectorFormat
    {
        return $this->format;
    }

    public function getPowerType(): ?PowerType
    {
        return $this->powerType;
    }

    public function getMaxVoltage(): ?int
    {
        return $this->maxVoltage;
    }

    public function getMaxAmperage(): ?int
    {
        return $this->maxAmperage;
    }

    public function getMaxElectricPower(): ?int
    {
        return $this->maxElectricPower;
    }

    public function getTariffIds(): ?array
    {
        return $this->tariffIds;
    }

    public function getTermsAndConditions(): ?string
    {
        return $this->termsAndConditions;
    }

    public function getLastUpdated(): ?DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [];

        if ($this->hasId()) {
            $return['id'] = $this->id;
        }
        if ($this->hasStandard()) {
            $return['standard'] = $this->standard;
        }
        if ($this->hasFormat()) {
            $return['format'] = $this->format;
        }
        if ($this->hasPowerType()) {
            $return['power_type'] = $this->powerType;
        }
        if ($this->hasMaxVoltage()) {
            $return['max_voltage'] = $this->maxVoltage;
        }
        if ($this->hasMaxAmperage()) {
            $return['max_amperage'] = $this->maxAmperage;
        }
        if ($this->hasMaxElectricPower()) {
            $return['max_electric_power'] = $this->maxElectricPower;
        }
        if ($this->hasTariffIds()) {
            $return['tariff_ids'] = $this->tariffIds;
        }
        if ($this->hasTermsAndConditions()) {
            $return['terms_and_conditions'] = $this->termsAndConditions;
        }
        if ($this->hasLastUpdated()) {
            $return['last_updated'] = DateTimeFormatter::format($this->lastUpdated);
        }

        return $return;
    }
}
