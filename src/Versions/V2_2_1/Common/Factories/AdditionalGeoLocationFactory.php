<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\AdditionalGeoLocation;
use stdClass;

class AdditionalGeoLocationFactory
{
    public static function fromJson(?stdClass $json): ?AdditionalGeoLocation
    {
        if ($json === null) {
            return null;
        }

        return new AdditionalGeoLocation(
            GeoLocationFactory::fromJson($json),
            DisplayTextFactory::fromJson($json->name ?? null)
        );
    }
}