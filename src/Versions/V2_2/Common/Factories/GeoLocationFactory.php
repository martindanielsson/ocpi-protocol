<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\GeoLocation;
use stdClass;

class GeoLocationFactory
{
    public static function fromJson(?stdClass $json): ?GeoLocation
    {
        if ($json === null) {
            return null;
        }

        return new GeoLocation(
            $json->latitude,
            $json->longitude
        );
    }
}