<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\RegularHours;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Weekday;
use stdClass;

class RegularHoursFactory
{
    public static function fromJson(?stdClass $json): ?RegularHours
    {
        if ($json === null) {
            return null;
        }

        return new RegularHours(
            new Weekday($json->weekday),
            $json->period_begin,
            $json->period_end
        );
    }
}