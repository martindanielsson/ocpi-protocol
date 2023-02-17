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

    private ?string $sessionId;

    private CdrToken $cdrToken;

    private AuthenticationMethod $authMethod;

    private CdrLocation $cdrLocation;

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

    private ?bool $credit;

    private ?string $creditReferenceId;

    private ?Price $totalFixedCost;

    private ?Price $totalEnergyCost;

    private ?Price $totalTimeCost;

    public function __construct(
        string               $countyCode,
        string               $partyId,
        string               $id,
        DateTime             $startDateTime,
        DateTime             $stopDateTime,
        ?string              $sessionId,
        CdrToken             $cdrToken,
        AuthenticationMethod $authMethod,
        CdrLocation          $cdrLocation,
        ?string              $meterId,
        string               $currency,
        Price                $totalCost,
        float                $totalEnergy,
        float                $totalTime,
        ?float               $totalParkingTime,
        ?string              $remark,
        DateTime             $lastUpdated,
        ?bool                $credit,
        ?string              $creditReferenceId,
        ?Price               $totalFixedCost,
        ?Price               $totalEnergyCost,
        ?Price               $totalTimeCost
    )
    {
        $this->countyCode = $countyCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->startDateTime = $startDateTime;
        $this->stopDateTime = $stopDateTime;
        $this->sessionId = $sessionId;
        $this->cdrToken = $cdrToken;
        $this->authMethod = $authMethod;
        $this->cdrLocation = $cdrLocation;
        $this->meterId = $meterId;
        $this->currency = $currency;
        $this->totalCost = $totalCost;
        $this->totalEnergy = $totalEnergy;
        $this->totalTime = $totalTime;
        $this->totalParkingTime = $totalParkingTime;
        $this->remark = $remark;
        $this->lastUpdated = $lastUpdated;
        $this->credit = $credit;
        $this->creditReferenceId = $creditReferenceId;
        $this->totalFixedCost = $totalFixedCost;
        $this->totalEnergyCost = $totalEnergyCost;
        $this->totalTimeCost = $totalTimeCost;
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

    public function getCdrToken(): CdrToken
    {
        return $this->cdrToken;
    }

    public function getAuthMethod(): AuthenticationMethod
    {
        return $this->authMethod;
    }

    public function getCdrLocation(): CdrLocation
    {
        return $this->cdrLocation;
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
            'cdr_token' => $this->cdrToken,
            'auth_method' => $this->authMethod,
            'cdr_location' => $this->cdrLocation,
            'currency' => $this->currency,
            'charging_periods' => $this->chargingPeriods,
            'total_cost' => $this->totalCost,
            'total_energy' => $this->totalEnergy,
            'total_time' => $this->totalTime,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated),
        ];

        if ($this->sessionId) {
            $return['session_id'] = $this->sessionId;
        }

        if (count($this->tariffs) > 0) {
            $return['tariffs'] = $this->tariffs;
        }

        if ($this->credit) {
            $return['credit'] = $this->credit;
            $return['credit_reference_id'] = $this->creditReferenceId;
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

        if ($this->totalFixedCost !== null) {
            $return['total_fixed_cost'] = $this->totalFixedCost;
        }

        if ($this->totalEnergyCost !== null) {
            $return['total_energy_cost'] = $this->totalEnergyCost;
        }

        if ($this->totalTimeCost !== null) {
            $return['total_time_cost'] = $this->totalTimeCost;
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

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function isCredit(): ?bool
    {
        return $this->credit;
    }

    public function getCreditReferenceId(): ?string
    {
        return $this->creditReferenceId;
    }

    public function getTotalFixedCost(): ?Price
    {
        return $this->totalFixedCost;
    }

    /**
     * @return Price|null
     */
    public function getTotalEnergyCost(): ?Price
    {
        return $this->totalEnergyCost;
    }

    /**
     * @return Price|null
     */
    public function getTotalTimeCost(): ?Price
    {
        return $this->totalTimeCost;
    }
}
