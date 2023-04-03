<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Tariff;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\TariffType;
use DateTime;
use stdClass;

class TariffFactory
{
    public static function fromJson(?stdClass $json): ?Tariff
    {
        if ($json === null) {
            return null;
        }

        $tariff = new Tariff(
            $json->country_code,
            $json->party_id,
            $json->id,
            $json->currency,
            !empty($json->type) ? new TariffType($json->type) : null,
            $json->tariff_alt_url ?? null,
            PriceFactory::fromJson($json->min_price),
            PriceFactory::fromJson($json->max_price),
            !empty($json->start_date_time) ? new DateTime($json->start_date_time) : null,
            !empty($json->end_date_time) ? new DateTime($json->end_date_time) : null,
            EnergyMixFactory::fromJson($json->energy_mix),
            new DateTime($json->last_updated)
        );

        foreach ($json->tariff_alt_text ?? [] as $tariffAltText) {
            $tariff->addTariffAltText(DisplayTextFactory::fromJson($tariffAltText));
        }

        foreach ($json->elements ?? [] as $element) {
            $tariff->addElement(TariffElementFactory::fromJson($element));
        }

        return $tariff;
    }
}
