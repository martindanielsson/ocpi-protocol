<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Session implements JsonSerializable
{
    private string $countryCode;
    private string $partyId;
    private string $id;
    private DateTime $startDateTime;
    private ?DateTime $endDateTime;
    private float $kwh;
    private CdrToken $cdrToken;
    private AuthMethod $authMethod;
    private ?string $authorizationReference;
    private string $locationId;
    private string $evseUid;
    private string $connectorId;
    private ?string $meterId;
    private string $currency;
    /** @var ChargingPeriod[] */
    private array $chargingPeriods = [];
    private ?Price $totalCost;
    private SessionStatus $status;
    private DateTime $lastUpdated;

    public function __construct(
        string $countryCode,
        string $partyId,
        string $id,
        DateTime $startDateTime,
        ?DateTime $endDateTime,
        float $kwh,
        CdrToken $cdrToken,
        AuthMethod $authMethod,
        ?string $authorizationReference,
        string $locationId,
        string $evseUid,
        string $connectorId,
        ?string $meterId,
        string $currency,
        ?Price $totalCost,
        SessionStatus $status,
        DateTime $lastUpdated
    ) {
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->kwh = $kwh;
        $this->cdrToken = $cdrToken;
        $this->authMethod = $authMethod;
        $this->authorizationReference = $authorizationReference;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
        $this->meterId = $meterId;
        $this->currency = $currency;
        $this->totalCost = $totalCost;
        $this->status = $status;
        $this->lastUpdated = $lastUpdated;
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

    public function getEndDateTime(): ?DateTime
    {
        return $this->endDateTime;
    }

    public function getKwh(): float
    {
        return $this->kwh;
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

    public function getLocationId(): string
    {
        return $this->locationId;
    }

    public function getEvseUid(): string
    {
        return $this->evseUid;
    }

    public function getConnectorId(): string
    {
        return $this->connectorId;
    }

    public function getMeterId(): ?string
    {
        return $this->meterId;
    }

    public function getCurrency(): string
    {
        return $this->currency;
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

    public function jsonSerialize(): array
    {
        return [
            'country_code' => $this->countryCode,
            'party_id' => $this->partyId,
            'id' => $this->id,
            'start_date_time' => DateTimeFormatter::format($this->startDateTime),
            'end_date_time' => DateTimeFormatter::format($this->endDateTime),
            'kwh' => $this->kwh,
            'cdr_token' => $this->cdrToken,
            'auth_method' => $this->authMethod,
            'authorization_reference' => $this->authorizationReference,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'connector_id' => $this->connectorId,
            'meter_id' => $this->meterId,
            'currency' => $this->currency,
            'charging_periods' => $this->chargingPeriods,
            'total_cost' => $this->totalCost,
            'status' => $this->status,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }

    public function merge(PartialSession $partialSession): self
    {
        $new = new Session(
            $partialSession->hasCountryCode() ? $partialSession->getCountryCode() : $this->countryCode,
            $partialSession->hasPartyId() ? $partialSession->getPartyId() : $this->partyId,
            $partialSession->hasId() ? $partialSession->getId() : $this->id,
            $partialSession->hasStartDateTime() ? $partialSession->getStartDateTime() : $this->startDateTime,
            $partialSession->hasEndDateTime() ? $partialSession->getEndDateTime() : $this->endDateTime,
            $partialSession->hasKwh() ? $partialSession->getKwh() : $this->kwh,
            $partialSession->hasCdrToken() ? $partialSession->getCdrToken() : $this->cdrToken,
            $partialSession->hasAuthMethod() ? $partialSession->getAuthMethod() : $this->authMethod,
            $partialSession->hasAuthorizationReference() ? $partialSession->getAuthorizationReference() : $this->authorizationReference,
            $partialSession->hasLocationId() ? $partialSession->getLocationId() : $this->locationId,
            $partialSession->hasEvseUid() ? $partialSession->getEvseUid() : $this->evseUid,
            $partialSession->hasConnectorId() ? $partialSession->getConnectorId() : $this->connectorId,
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

    /**
     * TODO: Update method
     */
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
}
