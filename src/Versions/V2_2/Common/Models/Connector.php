<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Connector implements JsonSerializable
{
    private string $id;
    private ConnectorType $standard;
    private ConnectorFormat $format;
    private PowerType $powerType;
    private int $maxVoltage;
    private int $maxAmperage;
    private ?int $maxElectricPower;
    /** @var string[] */
    private array $tariffIds = [];
    private ?string $termsAndConditions;
    private DateTime $lastUpdated;

    public function __construct(
        string $id,
        ConnectorType $standard,
        ConnectorFormat $format,
        PowerType $powerType,
        int $maxVoltage,
        int $maxAmperage,
        ?int $maxElectricPower,
        ?string $termsAndConditions,
        DateTime $lastUpdated
    ) {
        $this->id = $id;
        $this->standard = $standard;
        $this->format = $format;
        $this->powerType = $powerType;
        $this->maxVoltage = $maxVoltage;
        $this->maxAmperage = $maxAmperage;
        $this->maxElectricPower = $maxElectricPower;
        $this->termsAndConditions = $termsAndConditions;
        $this->lastUpdated = $lastUpdated;
    }

    public function addTariffId(string $tariffId): self
    {
        $this->tariffIds[] = $tariffId;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStandard(): ConnectorType
    {
        return $this->standard;
    }

    public function getformat(): ConnectorFormat
    {
        return $this->format;
    }

    public function getPowerType(): PowerType
    {
        return $this->powerType;
    }

    public function getMaxVoltage(): int
    {
        return $this->maxVoltage;
    }

    public function getMaxAmperage(): int
    {
        return $this->maxAmperage;
    }

    public function getMaxElectricPower(): ?int
    {
        return $this->maxElectricPower;
    }

    public function getTariffIds(): array
    {
        return $this->tariffIds;
    }

    public function getTermsAndConditions(): ?string
    {
        return $this->termsAndConditions;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'standard' => $this->standard,
            'format' => $this->format,
            'power_type' => $this->powerType,
            'max_voltage' => $this->maxVoltage,
            'max_amperage' => $this->maxAmperage,
            'max_electric_power' => $this->maxElectricPower,
            'tariff_ids' => $this->tariffIds,
            'terms_and_conditions' => $this->termsAndConditions,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }
}
