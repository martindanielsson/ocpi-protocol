<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Price;

class PriceFactory
{
    public static function fromJson(array $json): Price
    {
        return new Price($json->excl_vat, $json->incl_vat);
    }
}