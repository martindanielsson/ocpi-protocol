<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\DayOfWeek;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ReservationRestrictionType;
use Chargemap\OCPI\Versions\V2_2\Common\Models\TariffRestrictions;
use stdClass;

class TariffRestrictionsFactory
{
    public static function fromJson(?stdClass $json): ?TariffRestrictions
    {
        if ($json === null) {
            return null;
        }

        $tariffRestrictions = new TariffRestrictions(
            $json->start_time ?? null,
            $json->end_time ?? null,
            $json->start_date ?? null,
            $json->end_date ?? null,
            $json->min_kwh ?? null,
            $json->max_kwh ?? null,
            $json->min_current ?? null,
            $json->max_current ?? null,
            $json->min_power ?? null,
            $json->max_power ?? null,
            $json->min_duration ?? null,
            $json->max_duration ?? null,
            !empty($json->reservation) ? new ReservationRestrictionType($json->reservation) : null
        );

        foreach ($json->day_of_week ?? [] as $dayOfWeek) {
            $tariffRestrictions->addDayOfWeek(new DayOfWeek($dayOfWeek));
        }

        return $tariffRestrictions;
    }
}
