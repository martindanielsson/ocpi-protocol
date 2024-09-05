<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class AdditionalGeoLocation implements JsonSerializable
{
    private GeoLocation $geoLocation;
    private ?DisplayText $name;

    public function __construct(
        GeoLocation $geoLocation,
        ?DisplayText $name
    ) {
        $this->geoLocation = $geoLocation;
        $this->name = $name;
    }

    public function getGeoLocation(): GeoLocation
    {
        return $this->geoLocation;
    }

    public function getName(): ?DisplayText
    {
        return $this->name;
    }

    public function jsonSerialize(): array
    {
        return [
            'latitude' => $this->geoLocation->getLatitude(),
            'longitude' => $this->geoLocation->getLongitude(),
            'name' => $this->name
        ];
    }
}
