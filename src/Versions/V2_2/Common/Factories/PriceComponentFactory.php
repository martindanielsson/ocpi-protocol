<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\PriceComponent;
use Chargemap\OCPI\Versions\V2_2\Common\Models\TariffDimensionType;
use stdClass;

class PriceComponentFactory
{
    public static function fromJson(?stdClass $json): ?PriceComponent
    {
        if ($json === null) {
            return null;
        }

        return new PriceComponent(
            new TariffDimensionType($json->type),
            $json->price,
            $json->vat ?? null,
            $json->step_size
        );
    }
}
