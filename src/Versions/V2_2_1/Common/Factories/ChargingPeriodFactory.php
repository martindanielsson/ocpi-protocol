<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ChargingPeriod;
use DateTime;
use stdClass;

class ChargingPeriodFactory
{
    public static function fromJson(?stdClass $json): ?ChargingPeriod
    {
        if ($json === null) {
            return null;
        }

        $chargingPeriod = new ChargingPeriod(
            new DateTime($json->start_date_time),
            $json->tariff_id ?? null
        );

        foreach ($json->dimensions as $dimension) {
            $chargingPeriod->addDimension(CdrDimensionFactory::fromJson($dimension));
        }

        return $chargingPeriod;
    }
}
