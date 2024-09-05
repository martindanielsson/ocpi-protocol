<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Price;
use stdClass;

class PriceFactory
{
    public static function fromJson(?stdClass $json): ?Price
    {
        if ($json === null) {
            return null;
        }

        return new Price(
            $json->excl_vat,
            $json->incl_vat ?? null
        );
    }
}