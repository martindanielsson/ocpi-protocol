<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\GeoLocation;
use stdClass;

class GeoLocationFactory
{
    public static function fromJson(?stdClass $json): ?GeoLocation
    {
        if ($json === null) {
            return null;
        }

        $latitude = GeoLocationFactory::padCoordinate($json->latitude);
        $longitude = GeoLocationFactory::padCoordinate($json->longitude);

        return new GeoLocation(
            $latitude,
            $longitude
        );
    }

    /**
     * @param string $coordinate
     * @return string
     *
     * Hack for CPOs that break the contract and only send 4 or fewer decimals instead of the required 5-7.
     */
    public static function padCoordinate(string $coordinate): string
    {
        $parts = explode('.', $coordinate);
        $decimals = $parts[1] ?? '';
        $padded = str_pad($decimals, 5, '0');

        return $parts[0] . '.' . $padded;
    }
}