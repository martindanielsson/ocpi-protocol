<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class LocationReferences implements JsonSerializable
{
    private string $locationId;
    /** @var string[] */
    private array $evseUids = [];

    public function __construct(
        string $locationId
    ) {
        $this->locationId = $locationId;
    }

    public function addEvseUid(string $evseUid): self
    {
        $this->evseUids[] = $evseUid;
        return $this;
    }

    public function getLocationId(): string
    {
        return $this->locationId;
    }

    public function getEvseUids(): array
    {
        return $this->evseUids;
    }

    public function jsonSerialize(): array
    {
        return [
            'location_id' => $this->locationId,
            'evse_uids' => $this->evseUids
        ];
    }
}
