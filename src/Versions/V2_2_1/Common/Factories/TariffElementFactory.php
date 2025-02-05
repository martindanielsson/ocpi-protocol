<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\TariffElement;
use stdClass;

class TariffElementFactory
{
    public static function fromJson(?stdClass $json): ?TariffElement
    {
        if ($json === null) {
            return null;
        }

        $tariffElement = new TariffElement(
            TariffRestrictionsFactory::fromJson($json->restrictions ?? null),
        );

        foreach ($json->price_components ?? [] as $priceComponent) {
            $tariffElement->addPriceComponent(PriceComponentFactory::fromJson($priceComponent));
        }

        return $tariffElement;
    }
}
