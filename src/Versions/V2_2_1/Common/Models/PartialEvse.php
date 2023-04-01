<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

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
class PartialEvse extends PartialModel implements JsonSerializable
{
    private ?string $uid = null;
    private ?string $evseId = null;
    private ?Status $status = null;
    /** @var StatusSchedule[]|null */
    private ?array $statusSchedule = null;
    /** @var Capability[]|null */
    private ?array $capabilities = null;
    /** @var Connector[]|null */
    private ?array $connectors = null;
    private ?string $floorLevel = null;
    private ?GeoLocation $coordinates = null;
    private ?string $physicalReference = null;
    /** @var DisplayText[]|null */
    private ?array $directions = null;
    /** @var ParkingRestriction[]|null */
    private ?array $parkingRestrictions = null;
    /** @var Image[]|null */
    private ?array $images = null;
    private ?DateTime $lastUpdated = null;

    protected function _withUid(?string $uid): self
    {
        $this->uid = $uid;
        return $this;
    }

    protected function _withEvseId(?string $evseId): self
    {
        $this->evseId = $evseId;
        return $this;
    }

    protected function _withStatus(?Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    protected function _withStatusSchedule(): self
    {
        $this->statusSchedule = [];
        return $this;
    }

    public function addStatusSchedule(StatusSchedule $statusSchedule): self
    {
        $this->statusSchedule[] = $statusSchedule;
        return $this;
    }

    protected function _withCapabilities(): self
    {
        $this->capabilities = [];
        return $this;
    }

    public function addCapability(Capability $capability): self
    {
        $this->capabilities[] = $capability;
        return $this;
    }

    protected function _withConnectors(): self
    {
        $this->connectors = [];
        return $this;
    }

    public function addConnector(Connector $connector): self
    {
        $this->connectors[] = $connector;
        return $this;
    }

    protected function _withFloorLevel(?string $floorLevel): self
    {
        $this->floorLevel = $floorLevel;
        return $this;
    }

    protected function _withCoordinates(?GeoLocation $coordinates): self
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    protected function _withPhysicalReference(?string $physicalReference): self
    {
        $this->physicalReference = $physicalReference;
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

    protected function _withParkingRestrictions(): self
    {
        $this->parkingRestrictions = [];
        return $this;
    }

    public function addParkingRestriction(ParkingRestriction $parkingRestriction): self
    {
        $this->parkingRestrictions[] = $parkingRestriction;
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

    protected function _withLastUpdated(?DateTime $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function getEvseId(): ?string
    {
        return $this->evseId;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function getStatusSchedule(): ?array
    {
        return $this->statusSchedule;
    }

    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    public function getConnectors(): ?array
    {
        return $this->connectors;
    }

    public function getFloorLevel(): ?string
    {
        return $this->floorLevel;
    }

    public function getCoordinates(): ?GeoLocation
    {
        return $this->coordinates;
    }

    public function getPhysicalReference(): ?string
    {
        return $this->physicalReference;
    }

    public function getDirections(): ?array
    {
        return $this->directions;
    }

    public function getParkingRestrictions(): ?array
    {
        return $this->parkingRestrictions;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getLastUpdated(): ?DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        $return = [];

        if ($this->hasUid()){
            $return['uid'] = $this->uid;
        }
        if ($this->hasEvseId()){
            $return['evse_id'] = $this->evseId;
        }
        if ($this->hasStatus()){
            $return['status'] = $this->status;
        }
        if ($this->hasStatusSchedule()){
            $return['status_schedule'] = $this->statusSchedule;
        }
        if ($this->hasCapabilities()){
            $return['capabilities'] = $this->capabilities;
        }
        if ($this->hasConnectors()){
            $return['connectors'] = $this->connectors;
        }
        if ($this->hasFloorLevel()){
            $return['floor_level'] = $this->floorLevel;
        }
        if ($this->hasCoordinates()){
            $return['coordinates'] = $this->coordinates;
        }
        if ($this->hasPhysicalReference()){
            $return['physical_reference'] = $this->physicalReference;
        }
        if ($this->hasDirections()){
            $return['directions'] = $this->directions;
        }
        if ($this->hasParkingRestrictions()){
            $return['parking_restrictions'] = $this->parkingRestrictions;
        }
        if ($this->hasImages()){
            $return['images'] = $this->images;
        }
        if ($this->hasLastUpdated()){
            $return['last_updated'] = DateTimeFormatter::format($this->lastUpdated);
        }

        return $return;
    }
}
