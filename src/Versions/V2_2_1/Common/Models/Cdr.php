<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Cdr implements JsonSerializable
{
    private string $countryCode;
    private string $partyId;
    private string $id;
    private DateTime $startDateTime;
    private DateTime $endDateTime;
    private ?string $sessionId;
    private CdrToken $cdrToken;
    private AuthMethod $authMethod;
    private ?string $authorizationReference;
    private CdrLocation $cdrLocation;
    private ?string $meterId;
    private string $currency;
    /** @var Tariff[] */
    private array $tariffs = [];
    /** @var ChargingPeriod[] */
    private array $chargingPeriods = [];
    private ?SignedData $signedData;
    private Price $totalCost;
    private ?Price $totalFixedCost;
    private float $totalEnergy;
    private ?Price $totalEnergyCost;
    private float $totalTime;
    private ?Price $totalTimeCost;
    private ?float $totalParkingTime;
    private ?Price $totalParkingCost;
    private ?Price $totalReservationCost;
    private ?string $remark;
    private ?string $invoiceReferenceId;
    private ?boolean $credit;
    private ?string $creditReferenceId;
    private ?boolean $homeChargingCompensation;
    private DateTime $lastUpdated;

    public function __construct(
        string $countryCode,
        string $partyId,
        string $id,
        DateTime $startDateTime,
        DateTime $endDateTime,
        ?string $sessionId,
        CdrToken $cdrToken,
        AuthMethod $authMethod,
        ?string $authorizationReference,
        CdrLocation $cdrLocation,
        ?string $meterId,
        string $currency,
        ?SignedData $signedData,
        Price $totalCost,
        ?Price $totalFixedCost,
        float $totalEnergy,
        ?Price $totalEnergyCost,
        float $totalTime,
        ?Price $totalTimeCost,
        ?float $totalParkingTime,
        ?Price $totalParkingCost,
        ?Price $totalReservationCost,
        ?string $remark,
        ?string $invoiceReferenceId,
        ?boolean $credit,
        ?string $creditReferenceId,
        ?boolean $homeChargingCompensation,
        DateTime $lastUpdated
    ) {
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->sessionId = $sessionId;
        $this->cdrToken = $cdrToken;
        $this->authMethod = $authMethod;
        $this->authorizationReference = $authorizationReference;
        $this->cdrLocation = $cdrLocation;
        $this->meterId = $meterId;
        $this->currency = $currency;
        $this->signedData = $signedData;
        $this->totalCost = $totalCost;
        $this->totalFixedCost = $totalFixedCost;
        $this->totalEnergy = $totalEnergy;
        $this->totalEnergyCost = $totalEnergyCost;
        $this->totalTime = $totalTime;
        $this->totalTimeCost = $totalTimeCost;
        $this->totalParkingTime = $totalParkingTime;
        $this->totalParkingCost = $totalParkingCost;
        $this->totalReservationCost = $totalReservationCost;
        $this->remark = $remark;
        $this->invoiceReferenceId = $invoiceReferenceId;
        $this->credit = $credit;
        $this->creditReferenceId = $creditReferenceId;
        $this->homeChargingCompensation = $homeChargingCompensation;
        $this->lastUpdated = $lastUpdated;
    }

    public function addTariff(Tariff $tariff): self
    {
        $this->tariffs[] = $tariff;
        return $this;
    }

    public function addChargingPeriod(ChargingPeriod $chargingPeriod): self
    {
        $this->chargingPeriods[] = $chargingPeriod;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPartyId(): string
    {
        return $this->partyId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStartDateTime(): DateTime
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): DateTime
    {
        return $this->endDateTime;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function getCdrToken(): CdrToken
    {
        return $this->cdrToken;
    }

    public function getAuthMethod(): AuthMethod
    {
        return $this->authMethod;
    }

    public function getAuthorizationReference(): ?string
    {
        return $this->authorizationReference;
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

    public function getTariffs(): array
    {
        return $this->tariffs;
    }

    public function getChargingPeriods(): array
    {
        return $this->chargingPeriods;
    }

    public function getSignedData(): ?SignedData
    {
        return $this->signedData;
    }

    public function getTotalCost(): Price
    {
        return $this->totalCost;
    }

    public function getTotalFixedCost(): ?Price
    {
        return $this->totalFixedCost;
    }

    public function getTotalEnergy(): float
    {
        return $this->totalEnergy;
    }

    public function getTotalEnergyCost(): ?Price
    {
        return $this->totalEnergyCost;
    }

    public function getTotalTime(): float
    {
        return $this->totalTime;
    }

    public function getTotalTimeCost(): ?Price
    {
        return $this->totalTimeCost;
    }

    public function getTotalParkingTime(): ?float
    {
        return $this->totalParkingTime;
    }

    public function getTotalParkingCost(): ?Price
    {
        return $this->totalParkingCost;
    }

    public function getTotalReservationCost(): ?Price
    {
        return $this->totalReservationCost;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function getInvoiceReferenceId(): ?string
    {
        return $this->invoiceReferenceId;
    }

    public function getCredit(): ?boolean
    {
        return $this->credit;
    }

    public function getCreditReferenceId(): ?string
    {
        return $this->creditReferenceId;
    }

    public function getHomeChargingCompensation(): ?boolean
    {
        return $this->homeChargingCompensation;
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
            'id' => $this->id,
            'start_date_time' => DateTimeFormatter::format($this->startDateTime),
            'end_date_time' => DateTimeFormatter::format($this->endDateTime),
            'session_id' => $this->sessionId,
            'cdr_token' => $this->cdrToken,
            'auth_method' => $this->authMethod,
            'authorization_reference' => $this->authorizationReference,
            'cdr_location' => $this->cdrLocation,
            'meter_id' => $this->meterId,
            'currency' => $this->currency,
            'tariffs' => $this->tariffs,
            'charging_periods' => $this->chargingPeriods,
            'signed_data' => $this->signedData,
            'total_cost' => $this->totalCost,
            'total_fixed_cost' => $this->totalFixedCost,
            'total_energy' => $this->totalEnergy,
            'total_energy_cost' => $this->totalEnergyCost,
            'total_time' => $this->totalTime,
            'total_time_cost' => $this->totalTimeCost,
            'total_parking_time' => $this->totalParkingTime,
            'total_parking_cost' => $this->totalParkingCost,
            'total_reservation_cost' => $this->totalReservationCost,
            'remark' => $this->remark,
            'invoice_reference_id' => $this->invoiceReferenceId,
            'credit' => $this->credit,
            'credit_reference_id' => $this->creditReferenceId,
            'home_charging_compensation' => $this->homeChargingCompensation,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }
}
