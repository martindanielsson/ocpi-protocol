<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

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
class PartialLocation extends PartialModel implements JsonSerializable
{
    private ?string $countryCode = null;
    private ?string $partyId = null;
    private ?string $id = null;
    private ?bool $publish = null;
    /** @var PublishTokenType[]|null */
    private ?array $publishAllowedTo = null;
    private ?string $name = null;
    private ?string $address = null;
    private ?string $city = null;
    private ?string $postalCode = null;
    private ?string $state = null;
    private ?string $country = null;
    private ?GeoLocation $coordinates = null;
    /** @var AdditionalGeoLocation[]|null */
    private ?array $relatedLocations = null;
    private ?ParkingType $parkingType = null;
    /** @var Evse[]|null */
    private ?array $evses = null;
    /** @var DisplayText[]|null */
    private ?array $directions = null;
    private ?BusinessDetails $operator = null;
    private ?BusinessDetails $suboperator = null;
    private ?BusinessDetails $owner = null;
    /** @var Facility[]|null */
    private ?array $facilities = null;
    private ?string $timeZone = null;
    private ?Hours $openingTimes = null;
    private ?bool $chargingWhenClosed = null;
    /** @var Image[]|null */
    private ?array $images = null;
    private ?EnergyMix $energyMix = null;
    private ?DateTime $lastUpdated = null;

    protected function _withCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    protected function _withPartyId(?string $partyId): self
    {
        $this->partyId = $partyId;
        return $this;
    }

    protected function _withId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    protected function _withPublish(?bool $publish): self
    {
        $this->publish = $publish;
        return $this;
    }

    protected function _withPublishAllowedTo(): self
    {
        $this->publishAllowedTo = [];
        return $this;
    }

    public function addPublishAllowedTo(PublishTokenType $publishAllowedTo): self
    {
        $this->publishAllowedTo[] = $publishAllowedTo;
        return $this;
    }

    protected function _withName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    protected function _withAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    protected function _withCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    protected function _withPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    protected function _withState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }

    protected function _withCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    protected function _withCoordinates(?GeoLocation $coordinates): self
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    protected function _withRelatedLocations(): self
    {
        $this->relatedLocations = [];
        return $this;
    }

    public function addRelatedLocation(AdditionalGeoLocation $relatedLocation): self
    {
        $this->relatedLocations[] = $relatedLocation;
        return $this;
    }

    protected function _withParkingType(?ParkingType $parkingType): self
    {
        $this->parkingType = $parkingType;
        return $this;
    }

    protected function _withEvses(): self
    {
        $this->evses = [];
        return $this;
    }

    public function addEvse(Evse $evse): self
    {
        $this->evses[] = $evse;
        return $this;
    }

    protected function _withDirections(): self
    {
        $this->directions = [];
        return $this;
    }

    public function addDirection(DisplayText $direction): self
    {
        $this->directions[] = $direction;
        return $this;
    }

    protected function _withOperator(?BusinessDetails $operator): self
    {
        $this->operator = $operator;
        return $this;
    }

    protected function _withSuboperator(?BusinessDetails $suboperator): self
    {
        $this->suboperator = $suboperator;
        return $this;
    }

    protected function _withOwner(?BusinessDetails $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    protected function _withFacilities(): self
    {
        $this->facilities = [];
        return $this;
    }

    public function addFacility(Facility $facility): self
    {
        $this->facilities[] = $facility;
        return $this;
    }

    protected function _withTimeZone(?string $timeZone): self
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    protected function _withOpeningTimes(?Hours $openingTimes): self
    {
        $this->openingTimes = $openingTimes;
        return $this;
    }

    protected function _withChargingWhenClosed(?bool $chargingWhenClosed): self
    {
        $this->chargingWhenClosed = $chargingWhenClosed;
        return $this;
    }

    protected function _withImages(): self
    {
        $this->images = [];
        return $this;
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;
        return $this;
    }

    protected function _withEnergyMix(?EnergyMix $energyMix): self
    {
        $this->energyMix = $energyMix;
        return $this;
    }

    protected function _withLastUpdated(?DateTime $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function getPartyId(): ?string
    {
        return $this->partyId;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPublish(): ?bool
    {
        return $this->publish;
    }

    public function getPublishAllowedTo(): ?array
    {
        return $this->publishAllowedTo;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getCity(): ?string
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getCoordinates(): ?GeoLocation
    {
        return $this->coordinates;
    }

    public function getRelatedLocations(): ?array
    {
        return $this->relatedLocations;
    }

    public function getParkingType(): ?ParkingType
    {
        return $this->parkingType;
    }

    public function getEvses(): ?array
    {
        return $this->evses;
    }

    public function getDirections(): ?array
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

    public function getFacilities(): ?array
    {
        return $this->facilities;
    }

    public function getTimeZone(): ?string
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

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getEnergyMix(): ?EnergyMix
    {
        return $this->energyMix;
    }

    public function getLastUpdated(): ?DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [];

        if ($this->hasCountryCode()) {
            $return['country_code'] = $this->countryCode;
        }
        if ($this->hasPartyId()) {
            $return['party_id'] = $this->partyId;
        }
        if ($this->hasId()) {
            $return['id'] = $this->id;
        }
        if ($this->hasPublish()) {
            $return['publish'] = $this->publish;
        }
        if ($this->hasPublishAllowedTo()) {
            $return['publish_allowed_to'] = $this->publishAllowedTo;
        }
        if ($this->hasName()) {
            $return['name'] = $this->name;
        }
        if ($this->hasAddress()) {
            $return['address'] = $this->address;
        }
        if ($this->hasCity()) {
            $return['city'] = $this->city;
        }
        if ($this->hasPostalCode()) {
            $return['postal_code'] = $this->postalCode;
        }
        if ($this->hasState()) {
            $return['state'] = $this->state;
        }
        if ($this->hasCountry()) {
            $return['country'] = $this->country;
        }
        if ($this->hasCoordinates()) {
            $return['coordinates'] = $this->coordinates;
        }
        if ($this->hasRelatedLocations()) {
            $return['related_locations'] = $this->relatedLocations;
        }
        if ($this->hasParkingType()) {
            $return['parking_type'] = $this->parkingType;
        }
        if ($this->hasEvses()) {
            $return['evses'] = $this->evses;
        }
        if ($this->hasDirections()) {
            $return['directions'] = $this->directions;
        }
        if ($this->hasOperator()) {
            $return['operator'] = $this->operator;
        }
        if ($this->hasSuboperator()) {
            $return['suboperator'] = $this->suboperator;
        }
        if ($this->hasOwner()) {
            $return['owner'] = $this->owner;
        }
        if ($this->hasFacilities()) {
            $return['facilities'] = $this->facilities;
        }
        if ($this->hasTimeZone()) {
            $return['time_zone'] = $this->timeZone;
        }
        if ($this->hasOpeningTimes()) {
            $return['opening_times'] = $this->openingTimes;
        }
        if ($this->hasChargingWhenClosed()) {
            $return['charging_when_closed'] = $this->chargingWhenClosed;
        }
        if ($this->hasImages()) {
            $return['images'] = $this->images;
        }
        if ($this->hasEnergyMix()) {
            $return['energy_mix'] = $this->energyMix;
        }
        if ($this->hasLastUpdated()) {
            $return['last_updated'] = DateTimeFormatter::format($this->lastUpdated);
        }

        return $return;
    }
}
