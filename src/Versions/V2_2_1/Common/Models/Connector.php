<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;


use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Connector implements JsonSerializable
{
    private string $id;

    private ConnectorType $standard;

    private ConnectorFormat $format;

    private PowerType $powerType;

    private int $voltage;

    private int $amperage;

    private ?array $tariffIds;

    private ?string $termsAndConditions;

    private DateTime $lastUpdated;

    private ?int $maxElectricPower;

    /**
     * Connector constructor.
     * @param string $id
     * @param ConnectorType $standard
     * @param ConnectorFormat $format
     * @param PowerType $powerType
     * @param int $voltage
     * @param int $amperage
     * @param array|null $tariffIds
     * @param string|null $termsAndConditions
     * @param DateTime $lastUpdated
     * @param int|null $maxElectricPower
     */
    public function __construct(string $id, ConnectorType $standard, ConnectorFormat $format, PowerType $powerType, int $voltage, int $amperage, ?array $tariffIds, ?string $termsAndConditions, DateTime $lastUpdated, ?int $maxElectricPower)
    {
        $this->id = $id;
        $this->standard = $standard;
        $this->format = $format;
        $this->powerType = $powerType;
        $this->voltage = $voltage;
        $this->amperage = $amperage;
        $this->tariffIds = $tariffIds;
        $this->termsAndConditions = $termsAndConditions;
        $this->lastUpdated = $lastUpdated;
        $this->maxElectricPower = $maxElectricPower;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStandard(): ConnectorType
    {
        return $this->standard;
    }

    public function getFormat(): ConnectorFormat
    {
        return $this->format;
    }

    public function getPowerType(): PowerType
    {
        return $this->powerType;
    }

    public function getVoltage(): int
    {
        return $this->voltage;
    }

    public function getAmperage(): int
    {
        return $this->amperage;
    }

    public function getTariffIds(): ?array
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
        $return = [
            'id' => $this->id,
            'standard' => $this->standard,
            'format' => $this->format,
            'power_type' => $this->powerType,
            'voltage' => $this->voltage,
            'amperage' => $this->amperage,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated),
        ];

        if ($this->tariffIds !== null) {
            $return['tariff_ids'] = $this->tariffIds;
        }

        if ($this->termsAndConditions !== null) {
            $return['terms_and_conditions'] = $this->termsAndConditions;
        }

        if ($this->maxElectricPower !== null) {
            $return['max_electric_power'] = $this->maxElectricPower;
        }

        return $return;
    }

    public function getMaxElectricPower(): ?int
    {
        return $this->maxElectricPower;
    }
}
