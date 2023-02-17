<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\AuthenticationMethod;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Cdr;
use DateTime;
use stdClass;

class CdrFactory
{
    public static function fromJson(?stdClass $json): ?Cdr
    {
        if ($json === null) {
            return null;
        }

        $cdr = new Cdr(
            $json->county_code,
            $json->party_id,
            $json->id,
            new DateTime($json->start_date_time),
            new DateTime($json->end_date_time),
            $json->session_id ?? null,
            CdrTokenFactory::fromJson($json->cdr_token),
            new AuthenticationMethod($json->auth_method),
            CdrLocationFactory::fromJson($json->cdr_location),
            $json->meter_id ?? null,
            $json->currency,
            PriceFactory::fromJson($json->total_cost),
            $json->total_energy,
            $json->total_time,
            $json->total_parking_time ?? null,
            $json->remark ?? null,
            new DateTime($json->last_updated),
            $json->credit ?? null,
            $json->credit_reference_id ?? null,
            $json->total_fixed_cost ? PriceFactory::fromJson($json->total_fixed_cost) : null,
            $json->total_energy_cost ? PriceFactory::fromJson($json->total_energy_cost) : null,
            $json->total_time_cost ? PriceFactory::fromJson($json->total_time_cost) : null,
            $json->total_parking_cost ? PriceFactory::fromJson($json->total_parking_cost) : null,
        );

        if (property_exists($json, 'tariffs')) {
            foreach (TariffFactory::arrayFromJsonArray($json->tariffs) as $tariff) {
                $cdr->addTariff($tariff);
            }
        }

        if (property_exists($json, 'charging_periods')) {
            foreach (ChargingPeriodFactory::arrayFromJsonArray($json->charging_periods) as $chargingPeriod) {
                $cdr->addChargingPeriod($chargingPeriod);
            }
        }

        return $cdr;
    }
}
