<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Cdr implements JsonSerializable
{
    private string $countyCode;

    private string $partyId;

    private string $id;

    private DateTime $startDateTime;

    private DateTime $stopDateTime;

    private string $sessionId;

    private string $authId;

    private AuthenticationMethod $authMethod;

    private Location $location;

    private ?string $meterId;

    private string $currency;

    /** @var Tariff[] */
    private array $tariffs = [];

    /** @var ChargingPeriod[] */
    private array $chargingPeriods = [];

    private Price $totalCost;

    private float $totalEnergy;

    private float $totalTime;

    private ?float $totalParkingTime;

    private ?string $remark;

    private DateTime $lastUpdated;

    public function __construct(
        string $countyCode,
        string $partyId,
        string $id,
        DateTime $startDateTime,
        DateTime $stopDateTime,
        string $sessionId,
        string $authId,
        AuthenticationMethod $authMethod,
        Location $location,
        ?string $meterId,
        string $currency,
        Price $totalCost,
        float $totalEnergy,
        float $totalTime,
        ?float $totalParkingTime,
        ?string $remark,
        DateTime $lastUpdated
    )
    {
        $this->countyCode = $countyCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->startDateTime = $startDateTime;
        $this->stopDateTime = $stopDateTime;
        $this->sessionId = $sessionId;
        $this->authId = $authId;
        $this->authMethod = $authMethod;
        $this->location = $location;
        $this->meterId = $meterId;
        $this->currency = $currency;
        $this->totalCost = $totalCost;
        $this->totalEnergy = $totalEnergy;
        $this->totalTime = $totalTime;
        $this->totalParkingTime = $totalParkingTime;
        $this->remark = $remark;
        $this->lastUpdated = $lastUpdated;
    }

    public function addTariff(Tariff $tariff): self
    {
        $this->tariffs[] = $tariff;

        return $this;
    }

    public function addChargingPeriod(ChargingPeriod $period): self
    {
        $this->chargingPeriods[] = $period;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStartDateTime(): DateTime
    {
        return $this->startDateTime;
    }

    public function getStopDateTime(): DateTime
    {
        return $this->stopDateTime;
    }

    public function getAuthId(): string
    {
        return $this->authId;
    }

    public function getAuthMethod(): AuthenticationMethod
    {
        return $this->authMethod;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getMeterId(): ?string
    {
        return $this->meterId;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return Tariff[]
     */
    public function getTariffs(): array
    {
        return $this->tariffs;
    }

    /**
     * @return ChargingPeriod[]
     */
    public function getChargingPeriods(): array
    {
        return $this->chargingPeriods;
    }

    public function getTotalCost(): Price
    {
        return $this->totalCost;
    }

    public function getTotalEnergy(): float
    {
        return $this->totalEnergy;
    }

    public function getTotalTime(): float
    {
        return $this->totalTime;
    }

    public function getTotalParkingTime(): ?float
    {
        return $this->totalParkingTime;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'county_code' => $this->countyCode,
            'party_id' => $this->partyId,
            'id' => $this->id,
            'start_date_time' => DateTimeFormatter::format($this->startDateTime),
            'end_date_time' => DateTimeFormatter::format($this->stopDateTime),
            'session_id' => $this->sessionId,
            'auth_id' => $this->authId,
            'auth_method' => $this->authMethod,
            'location' => $this->location,
            'currency' => $this->currency,
            'charging_periods' => $this->chargingPeriods,
            'total_cost' => $this->totalCost,
            'total_energy' => $this->totalEnergy,
            'total_time' => $this->totalTime,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated),
        ];

        if (count($this->tariffs) > 0) {
            $return['tariffs'] = $this->tariffs;
        }

        if ($this->meterId !== null) {
            $return['meter_id'] = $this->meterId;
        }

        if ($this->totalParkingTime !== null) {
            $return['total_parking_time'] = $this->totalParkingTime;
        }

        if ($this->remark !== null) {
            $return['remark'] = $this->remark;
        }

        return $return;
    }

    /**
     * @return string
     */
    public function getCountyCode(): string
    {
        return $this->countyCode;
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
    public function getSessionId(): string
    {
        return $this->sessionId;
    }
}
