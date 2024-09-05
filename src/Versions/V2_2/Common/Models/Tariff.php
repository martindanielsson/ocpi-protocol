<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Tariff implements JsonSerializable
{
    private string $countryCode;
    private string $partyId;
    private string $id;
    private string $currency;
    private ?TariffType $type;
    /** @var DisplayText[] */
    private array $tariffAltText = [];
    private ?string $tariffAltUrl;
    private ?Price $minPrice;
    private ?Price $maxPrice;
    /** @var TariffElement[] */
    private array $elements = [];
    private ?DateTime $startDateTime;
    private ?DateTime $endDateTime;
    private ?EnergyMix $energyMix;
    private DateTime $lastUpdated;

    public function __construct(
        string $countryCode,
        string $partyId,
        string $id,
        string $currency,
        ?TariffType $type,
        ?string $tariffAltUrl,
        ?Price $minPrice,
        ?Price $maxPrice,
        ?DateTime $startDateTime,
        ?DateTime $endDateTime,
        ?EnergyMix $energyMix,
        DateTime $lastUpdated
    ) {
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->currency = $currency;
        $this->type = $type;
        $this->tariffAltUrl = $tariffAltUrl;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->energyMix = $energyMix;
        $this->lastUpdated = $lastUpdated;
    }

    public function addTariffAltText(DisplayText $tariffAltText): self
    {
        $this->tariffAltText[] = $tariffAltText;
        return $this;
    }

    public function addElement(TariffElement $element): self
    {
        $this->elements[] = $element;
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

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getType(): ?TariffType
    {
        return $this->type;
    }

    public function getTariffAltText(): array
    {
        return $this->tariffAltText;
    }

    public function getTariffAltUrl(): ?string
    {
        return $this->tariffAltUrl;
    }

    public function getMinPrice(): ?Price
    {
        return $this->minPrice;
    }

    public function getMaxPrice(): ?Price
    {
        return $this->maxPrice;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function getStartDateTime(): ?DateTime
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): ?DateTime
    {
        return $this->endDateTime;
    }

    public function getEnergyMix(): ?EnergyMix
    {
        return $this->energyMix;
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
            'currency' => $this->currency,
            'type' => $this->type,
            'tariff_alt_text' => $this->tariffAltText,
            'tariff_alt_url' => $this->tariffAltUrl,
            'min_price' => $this->minPrice,
            'max_price' => $this->maxPrice,
            'elements' => $this->elements,
            'start_date_time' => DateTimeFormatter::format($this->startDateTime),
            'end_date_time' => DateTimeFormatter::format($this->endDateTime),
            'energy_mix' => $this->energyMix,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }
}
