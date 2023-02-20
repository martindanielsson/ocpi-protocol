<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CdrLocation;

class CdrLocationFactory
{
    public static function fromJson(\stdClass $json): CdrLocation
    {
        return new CdrLocation(
            $json->id,
            $json->name ?? null,
            $json->address,
            $json->city,
            $json->postal_code ?? null,
            $json->state ?? null,
            $json->country,
            $json->coordinates,
            $json->evse_uid,
            $json->evse_id,
            $json->connector_id,
            $json->connector_standard,
            $json->connector_format,
            $json->connector_power_type
        );
    }
}