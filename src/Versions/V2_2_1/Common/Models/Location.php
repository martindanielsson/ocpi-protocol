<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Location implements JsonSerializable
{
    private string $countryCode;
    private string $partyId;
    private string $id;
    private bool $publish;
    /** @var PublishTokenType[] */
    private array $publishAllowedTo = [];
    private ?string $name;
    private string $address;
    private string $city;
    private ?string $postalCode;
    private ?string $state;
    private string $country;
    private GeoLocation $coordinates;
    /** @var AdditionalGeoLocation[] */
    private array $relatedLocations = [];
    private ?ParkingType $parkingType;
    /** @var Evse[] */
    private array $evses = [];
    /** @var DisplayText[] */
    private array $directions = [];
    private ?BusinessDetails $operator;
    private ?BusinessDetails $suboperator;
    private ?BusinessDetails $owner;
    /** @var Facility[] */
    private array $facilities = [];
    private string $timeZone;
    private ?Hours $openingTimes;
    private ?bool $chargingWhenClosed;
    /** @var Image[] */
    private array $images = [];
    private ?EnergyMix $energyMix;
    private DateTime $lastUpdated;

    public function __construct(
        string $countryCode,
        string $partyId,
        string $id,
        bool $publish,
        ?string $name,
        string $address,
        string $city,
        ?string $postalCode,
        ?string $state,
        string $country,
        GeoLocation $coordinates,
        ?ParkingType $parkingType,
        ?BusinessDetails $operator,
        ?BusinessDetails $suboperator,
        ?BusinessDetails $owner,
        string $timeZone,
        ?Hours $openingTimes,
        ?bool $chargingWhenClosed,
        ?EnergyMix $energyMix,
        DateTime $lastUpdated
    ) {
        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->id = $id;
        $this->publish = $publish;
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->state = $state;
        $this->country = $country;
        $this->coordinates = $coordinates;
        $this->parkingType = $parkingType;
        $this->operator = $operator;
        $this->suboperator = $suboperator;
        $this->owner = $owner;
        $this->timeZone = $timeZone;
        $this->openingTimes = $openingTimes;
        $this->chargingWhenClosed = $chargingWhenClosed;
        $this->energyMix = $energyMix;
        $this->lastUpdated = $lastUpdated;
    }

    public function addPublishAllowedTo(PublishTokenType $publishAllowedTo): self
    {
        $this->publishAllowedTo[] = $publishAllowedTo;
        return $this;
    }

    public function addRelatedLocation(AdditionalGeoLocation $relatedLocation): self
    {
        $this->relatedLocations[] = $relatedLocation;
        return $this;
    }

    public function addEvse(Evse $evse): self
    {
        $this->evses[] = $evse;
        return $this;
    }

    public function addDirection(DisplayText $direction): self
    {
        $this->directions[] = $direction;
        return $this;
    }

    public function addFacility(Facility $facility): self
    {
        $this->facilities[] = $facility;
        return $this;
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;
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

    public function getPublish(): bool
    {
        return $this->publish;
    }

    public function getPublishAllowedTo(): array
    {
        return $this->publishAllowedTo;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCoordinates(): GeoLocation
    {
        return $this->coordinates;
    }

    public function getRelatedLocations(): array
    {
        return $this->relatedLocations;
    }

    public function getParkingType(): ?ParkingType
    {
        return $this->parkingType;
    }

    public function getEvses(): array
    {
        return $this->evses;
    }

    public function getDirections(): array
    {
        return $this->directions;
    }

    public function getOperator(): ?BusinessDetails
    {
        return $this->operator;
    }

    public function getSuboperator(): ?BusinessDetails
    {
        return $this->suboperator;
    }

    public function getOwner(): ?BusinessDetails
    {
        return $this->owner;
    }

    public function getFacilities(): array
    {
        return $this->facilities;
    }

    public function getTimeZone(): string
    {
        return $this->timeZone;
    }

    public function getOpeningTimes(): ?Hours
    {
        return $this->openingTimes;
    }

    public function getChargingWhenClosed(): ?bool
    {
        return $this->chargingWhenClosed;
    }

    public function getImages(): array
    {
        return $this->images;
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
            'publish' => $this->publish,
            'publish_allowed_to' => $this->publishAllowedTo,
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'postal_code' => $this->postalCode,
            'state' => $this->state,
            'country' => $this->country,
            'coordinates' => $this->coordinates,
            'related_locations' => $this->relatedLocations,
            'parking_type' => $this->parkingType,
            'evses' => $this->evses,
            'directions' => $this->directions,
            'operator' => $this->operator,
            'suboperator' => $this->suboperator,
            'owner' => $this->owner,
            'facilities' => $this->facilities,
            'time_zone' => $this->timeZone,
            'opening_times' => $this->openingTimes,
            'charging_when_closed' => $this->chargingWhenClosed,
            'images' => $this->images,
            'energy_mix' => $this->energyMix,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }

    public function merge(PartialLocation $partialLocation): self
    {
        $new = new Location(
            $partialLocation->hasCountryCode() ? $partialLocation->getCountryCode() : $this->countryCode,
            $partialLocation->hasPartyId() ? $partialLocation->getPartyId() : $this->partyId,
            $partialLocation->hasId() ? $partialLocation->getId() : $this->id,
            $partialLocation->hasPublish() ? $partialLocation->getPublish() : $this->publish,
            $partialLocation->hasName() ? $partialLocation->getName() : $this->name,
            $partialLocation->hasAddress() ? $partialLocation->getAddress() : $this->address,
            $partialLocation->hasCity() ? $partialLocation->getCity() : $this->city,
            $partialLocation->hasPostalCode() ? $partialLocation->getPostalCode() : $this->postalCode,
            $partialLocation->hasState() ? $partialLocation->getState() : $this->state,
            $partialLocation->hasCountry() ? $partialLocation->getCountry() : $this->country,
            $partialLocation->hasCoordinates() ? $partialLocation->getCoordinates() : $this->coordinates,
            $partialLocation->hasParkingType() ? $partialLocation->getParkingType() : $this->parkingType,
            $partialLocation->hasOperator() ? $partialLocation->getOperator() : $this->operator,
            $partialLocation->hasSuboperator() ? $partialLocation->getSuboperator() : $this->suboperator,
            $partialLocation->hasOwner() ? $partialLocation->getOwner() : $this->owner,
            $partialLocation->hasTimeZone() ? $partialLocation->getTimeZone() : $this->timeZone,
            $partialLocation->hasOpeningTimes()
                ? $partialLocation->getOpeningTimes() : $this->openingTimes,
            $partialLocation->hasChargingWhenClosed()
                ? $partialLocation->getChargingWhenClosed() : $this->chargingWhenClosed,
            $partialLocation->hasEnergyMix() ? $partialLocation->getEnergyMix() : $this->energyMix,
            $partialLocation->hasLastUpdated() ? $partialLocation->getLastUpdated() : $this->lastUpdated,
        );

        $publishAllowedTo = $partialLocation->hasPublishAllowedTo()
            ? $partialLocation->getPublishAllowedTo() : $this->publishAllowedTo;

        if ($publishAllowedTo) {
            foreach ($publishAllowedTo as $allowedTo) {
                $new->addPublishAllowedTo($allowedTo);
            }
        }

        $relatedLocations = $partialLocation->hasRelatedLocations()
            ? $partialLocation->getRelatedLocations() : $this->relatedLocations;

        if ($relatedLocations) {
            foreach ($relatedLocations as $relatedLocation) {
                $new->addRelatedLocation($relatedLocation);
            }
        }

        $evses = $partialLocation->hasEvses() ? $partialLocation->getEvses() : $this->evses;

        if ($evses) {
            foreach ($evses as $evse) {
                $new->addEvse($evse);
            }
        }

        $directions = $partialLocation->hasDirections() ? $partialLocation->getDirections() : $this->directions;

        if ($directions) {
            foreach ($directions as $direction) {
                $new->addDirection($direction);
            }
        }

        $facilities = $partialLocation->hasFacilities() ? $partialLocation->getFacilities() : $this->facilities;

        if ($facilities) {
            foreach ($facilities as $facility) {
                $new->addFacility($facility);
            }
        }

        $images = $partialLocation->hasImages() ? $partialLocation->getImages() : $this->images;

        if ($images) {
            foreach ($images as $image) {
                $new->addImage($image);
            }
        }

        return $new;
    }
}
