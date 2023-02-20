<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Session implements JsonSerializable
{
    private string $id;
    private DateTime $startDate;
    private ?DateTime $endDate;
    private float $kwh;
    private CdrToken $cdrToken;
    private AuthenticationMethod $authMethod;
    private ?string $meterId;
    private string $currency;
    /** @var ChargingPeriod[] */
    private array $chargingPeriods = [];
    private ?Price $totalCost;
    private SessionStatus $status;
    private DateTime $lastUpdated;
    private string $countyCode;
    private string $partyId;
    private DateTime $startDateTime;
    private ?DateTime $endDateTime;
    private string $locationId;
    private string $evseUid;
    private string $connectorId;
    private string $authorizationReference;

    public function __construct(
        string               $id,
        DateTime             $startDate,
        ?DateTime            $endDate,
        float                $kwh,
        CdrToken             $cdrToken,
        AuthenticationMethod $authMethod,
        ?string              $meterId,
        string               $currency,
        ?Price               $totalCost,
        SessionStatus        $status,
        DateTime             $lastUpdated,
        string               $countyCode,
        string               $partyId,
        DateTime             $startDateTime,
        ?DateTime            $endDateTime,
        string               $locationId,
        string               $evseUid,
        string               $connectorId,
        string               $authorizationReference
    ) {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->kwh = $kwh;
        $this->cdrToken = $cdrToken;
        $this->authMethod = $authMethod;
        $this->meterId = $meterId;
        $this->currency = $currency;
        $this->totalCost = $totalCost;
        $this->status = $status;
        $this->lastUpdated = $lastUpdated;
        $this->countyCode = $countyCode;
        $this->partyId = $partyId;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
        $this->authorizationReference = $authorizationReference;
    }

    public function addChargingPeriod(ChargingPeriod $period): void
    {
        $this->chargingPeriods[] = $period;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function getKwh(): float
    {
        return $this->kwh;
    }

    public function getCdrToken(): CdrToken
    {
        return $this->cdrToken;
    }

    public function getAuthMethod(): AuthenticationMethod
    {
        return $this->authMethod;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getMeterId(): ?string
    {
        return $this->meterId;
    }

    public function getChargingPeriods(): array
    {
        return $this->chargingPeriods;
    }

    public function getTotalCost(): ?Price
    {
        return $this->totalCost;
    }

    public function getStatus(): SessionStatus
    {
        return $this->status;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function merge(PartialSession $partialSession): self
    {
        $new = new Session(
            $partialSession->hasId() ? $partialSession->getId() : $this->id,
            $partialSession->hasStartDate() ? $partialSession->getStartDate() : $this->startDate,
            $partialSession->hasEndDate() ? $partialSession->getEndDate() : $this->endDate,
            $partialSession->hasKwh() ? $partialSession->getKwh() : $this->kwh,
            $partialSession->hasCdrToken() ? $partialSession->getCdrToken() : $this->cdrToken,
            $partialSession->hasAuthMethod() ? $partialSession->getAuthMethod() : $this->authMethod,
            $partialSession->hasLocation() ? $partialSession->getLocation() : $this->location,
            $partialSession->hasMeterId() ? $partialSession->getMeterId() : $this->meterId,
            $partialSession->hasCurrency() ? $partialSession->getCurrency() : $this->currency,
            $partialSession->hasTotalCost() ? $partialSession->getTotalCost() : $this->totalCost,
            $partialSession->hasStatus() ? $partialSession->getStatus() : $this->status,
            $partialSession->hasLastUpdated() ? $partialSession->getLastUpdated() : $this->lastUpdated
        );
        $chargingPeriods = $partialSession->hasChargingPeriods() ? $partialSession->getChargingPeriods() : $this->chargingPeriods;
        foreach ($chargingPeriods as $chargingPeriod) {
            $new->addChargingPeriod($chargingPeriod);
        }
        return $new;
    }

    public function diff(Session $other): ?PartialSession
    {
        $diff = null;
        if ($this->id !== $other->id) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withId($other->id);
        }
        if ($this->startDate->getTimestamp() !== $other->startDate->getTimestamp()) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withStartDate($other->startDate);
        }
        if ($this->endDate === null && $other->endDate !== null) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withEndDate($other->endDate);
        }
        if ($this->endDate !== null && $other->endDate === null) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withEndDate($other->endDate);
        }
        if (
            $this->endDate !== null && $other->endDate !== null &&
            $this->endDate->getTimestamp() !== $other->endDate->getTimestamp()
        ) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withEndDate($other->endDate);
        }
        if ($this->kwh !== $other->kwh) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withKwh($other->kwh);
        }
        if ($this->cdrToken !== $other->cdrToken) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withAuthId($other->cdrToken);
        }
        if (!$this->authMethod->equals($other->authMethod)) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withAuthMethod($other->authMethod);
        }
        //TODO: replace by location "equals" method call
        if ($this->location != $other->location) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withLocation($other->location);
        }
        if ($this->meterId !== $other->meterId) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withMeterId($other->meterId);
        }
        if ($this->currency !== $other->currency) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withCurrency($other->currency);
        }
        if ($this->totalCost !== $other->totalCost) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withTotalCost($other->totalCost);
        }
        if (!$this->status->equals($other->status)) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withStatus($other->status);
        }
        if ($this->lastUpdated->getTimestamp() !== $other->lastUpdated->getTimestamp()) {
            $diff = $diff ?? new PartialSession();
            $diff = $diff->withLastUpdated($other->lastUpdated);
        }
        $chargingPeriodsDiff = self::chargingPeriodsDiff($this, $other);
        if ($chargingPeriodsDiff !== null) {
            $diff = $diff ?? new PartialSession();
            //There is a difference between to, so anyway we need to init charging periods array
            $diff = $diff->withChargingPeriods();
            foreach ($chargingPeriodsDiff as $chargingPeriod) {
                $diff = $diff->withChargingPeriod($chargingPeriod);
            }
        }

        return $diff;
    }

    /**
     * Null means no difference
     * Empty array means all charging periods was deleted
     * @return \Chargemap\OCPI\Versions\V2_2_1\Common\Models\ChargingPeriod[]|null
     */
    public static function chargingPeriodsDiff(Session $first, Session $second): ?array
    {
        if (count($first->chargingPeriods) === 0 && count($second->chargingPeriods) === 0) {
            return null;
        }
        if (count($second->chargingPeriods) === 0) {
            return [];
        }
        $diff = null;
        /** @var array<int, ChargingPeriod> $chargingPeriods */
        $chargingPeriods = [];
        foreach ($first->chargingPeriods as $chargingPeriod) {
            $chargingPeriods[$chargingPeriod->getStartDate()->getTimestamp()] = $chargingPeriod;
        }
        /** @var array<int, ChargingPeriod> $chargingPeriods */
        $otherChargingPeriods = [];
        foreach ($second->chargingPeriods as $chargingPeriod) {
            $otherChargingPeriods[$chargingPeriod->getStartDate()->getTimestamp()] = $chargingPeriod;
        }
        /** @var int $timestamp */
        foreach ($otherChargingPeriods as $timestamp => $otherPeriod) {
            if (!array_key_exists($timestamp, $chargingPeriods)) {
                if ($diff === null) {
                    $diff = [];
                }
                $diff[] = $otherPeriod;
            } elseif ($chargingPeriods[$timestamp]->getCdrDimensions() != $otherPeriod->getCdrDimensions()) {
                if ($diff === null) {
                    $diff = [];
                }
                $diff[] = $otherPeriod;
            }
        }

        return $diff;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'id' => $this->id,
            'start_datetime' => DateTimeFormatter::format($this->startDate),
            'kwh' => $this->kwh,
            'auth_id' => $this->cdrToken,
            'auth_method' => $this->authMethod,
            'location' => $this->location,
            'currency' => $this->currency,
            'charging_periods' => $this->chargingPeriods,
            'status' => $this->status,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated),
            'county_code' => $this->countyCode,
            'party_id' => $this->partyId,
            'start_date_time' => $this->startDateTime,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'connector_id' => $this->connectorId,
            'authorization_reference' => $this->authorizationReference
        ];

        if ($this->endDateTime !== null) {
            $return['end_date_time'] = $this->endDateTime;
        }

        if ($this->meterId !== null) {
            $return['meter_id'] = $this->meterId;
        }

        if ($this->totalCost !== null) {
            $return['total_cost'] = $this->totalCost;
        }

        if ($this->endDate !== null) {
            $return['end_datetime'] = DateTimeFormatter::format($this->endDate);
        }

        return $return;
    }
}
