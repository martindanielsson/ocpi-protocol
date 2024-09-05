<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\AuthMethod;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Cdr;
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
            $json->country_code,
            $json->party_id,
            $json->id,
            new DateTime($json->start_date_time),
            new DateTime($json->end_date_time),
            $json->session_id ?? null,
            CdrTokenFactory::fromJson($json->cdr_token),
            new AuthMethod($json->auth_method),
            $json->authorization_reference ?? null,
            CdrLocationFactory::fromJson($json->cdr_location),
            $json->meter_id ?? null,
            $json->currency,
            SignedDataFactory::fromJson($json->signed_data ?? null),
            PriceFactory::fromJson($json->total_cost),
            PriceFactory::fromJson($json->total_fixed_cost ?? null),
            $json->total_energy,
            PriceFactory::fromJson($json->total_energy_cost ?? null),
            $json->total_time,
            PriceFactory::fromJson($json->total_time_cost ?? null),
            $json->total_parking_time ?? null,
            PriceFactory::fromJson($json->total_parking_cost ?? null),
            PriceFactory::fromJson($json->total_reservation_cost ?? null),
            $json->remark ?? null,
            $json->invoice_reference_id ?? null,
            $json->credit ?? null,
            $json->credit_reference_id ?? null,
            new DateTime($json->last_updated)
        );

        foreach ($json->tariffs ?? [] as $tariff) {
            $cdr->addTariff(TariffFactory::fromJson($tariff));
        }

        foreach ($json->charging_periods ?? [] as $chargingPeriod) {
            $cdr->addChargingPeriod(ChargingPeriodFactory::fromJson($chargingPeriod));
        }

        return $cdr;
    }
}
