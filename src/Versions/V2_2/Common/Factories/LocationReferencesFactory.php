<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\LocationReferences;
use stdClass;

class LocationReferencesFactory
{
    public static function fromJson(?stdClass $json): ?LocationReferences
    {
        if ($json === null) {
            return null;
        }

        $locationReferences = new LocationReferences(
            $json->location_id
        );

        foreach ($json->evse_uids ?? [] as $evseUid) {
            $locationReferences->addEvseUid($evseUid);
        }

        return $locationReferences;
    }
}