<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Status;
use Chargemap\OCPI\Versions\V2_2\Common\Models\StatusSchedule;
use DateTime;
use stdClass;

class StatusScheduleFactory
{
    public static function fromJson(?stdClass $json): ?StatusSchedule
    {
        if ($json === null) {
            return null;
        }

        return new StatusSchedule(
            new DateTime($json->period_begin),
            !empty($json->period_end) ? new DateTime($json->period_end) : null,
            new Status($json->status)
        );
    }
}
