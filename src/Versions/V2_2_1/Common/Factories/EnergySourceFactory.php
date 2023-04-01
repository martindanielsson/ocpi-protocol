<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\EnergySource;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\EnergySourceCategory;
use stdClass;

class EnergySourceFactory
{
    public static function fromJson(?stdClass $json): ?EnergySource
    {
        if ($json === null) {
            return null;
        }

        return new EnergySource(
            new EnergySourceCategory($json->source),
            $json->percentage
        );
    }
}