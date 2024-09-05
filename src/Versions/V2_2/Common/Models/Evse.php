<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class Evse implements JsonSerializable
{
    private string $uid;
    private ?string $evseId;
    private Status $status;
    /** @var StatusSchedule[] */
    private array $statusSchedule = [];
    /** @var Capability[] */
    private array $capabilities = [];
    /** @var Connector[] */
    private array $connectors = [];
    private ?string $floorLevel;
    private ?GeoLocation $coordinates;
    private ?string $physicalReference;
    /** @var DisplayText[] */
    private array $directions = [];
    /** @var ParkingRestriction[] */
    private array $parkingRestrictions = [];
    /** @var Image[] */
    private array $images = [];
    private DateTime $lastUpdated;

    public function __construct(
        string $uid,
        ?string $evseId,
        Status $status,
        ?string $floorLevel,
        ?GeoLocation $coordinates,
        ?string $physicalReference,
        DateTime $lastUpdated
    ) {
        $this->uid = $uid;
        $this->evseId = $evseId;
        $this->status = $status;
        $this->floorLevel = $floorLevel;
        $this->coordinates = $coordinates;
        $this->physicalReference = $physicalReference;
        $this->lastUpdated = $lastUpdated;
    }

    public function addStatusSchedule(StatusSchedule $statusSchedule): self
    {
        $this->statusSchedule[] = $statusSchedule;
        return $this;
    }

    public function addCapability(Capability $capability): self
    {
        $this->capabilities[] = $capability;
        return $this;
    }

    public function addConnector(Connector $connector): self
    {
        $this->connectors[] = $connector;
        return $this;
    }

    public function addDirection(DisplayText $direction): self
    {
        $this->directions[] = $direction;
        return $this;
    }

    public function addParkingRestriction(ParkingRestriction $parkingRestriction): self
    {
        $this->parkingRestrictions[] = $parkingRestriction;
        return $this;
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;
        return $this;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getEvseId(): ?string
    {
        return $this->evseId;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getStatusSchedule(): array
    {
        return $this->statusSchedule;
    }

    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    public function getConnectors(): array
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

    public function getDirections(): array
    {
        return $this->directions;
    }

    public function getParkingRestrictions(): array
    {
        return $this->parkingRestrictions;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getLastUpdated(): DateTime
    {
        return $this->lastUpdated;
    }

    public function jsonSerialize(): array
    {
        return [
            'uid' => $this->uid,
            'evse_id' => $this->evseId,
            'status' => $this->status,
            'status_schedule' => $this->statusSchedule,
            'capabilities' => $this->capabilities,
            'connectors' => $this->connectors,
            'floor_level' => $this->floorLevel,
            'coordinates' => $this->coordinates,
            'physical_reference' => $this->physicalReference,
            'directions' => $this->directions,
            'parking_restrictions' => $this->parkingRestrictions,
            'images' => $this->images,
            'last_updated' => DateTimeFormatter::format($this->lastUpdated)
        ];
    }
}
