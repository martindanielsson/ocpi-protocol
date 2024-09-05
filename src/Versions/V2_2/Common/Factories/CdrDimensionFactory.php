<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\CdrDimension;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CdrDimensionType;
use stdClass;

class CdrDimensionFactory
{
    public static function fromJson(?stdClass $json): ?CdrDimension
    {
        if ($json === null) {
            return null;
        }

        return new CdrDimension(
            new CdrDimensionType($json->type),
            $json->volume
        );
    }
}