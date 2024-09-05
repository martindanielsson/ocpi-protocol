<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Hours;
use stdClass;

class HoursFactory
{
    public static function fromJson(?stdClass $json): ?Hours
    {
        if ($json === null) {
            return null;
        }

        $hours = new Hours(
            $json->twentyfourseven
        );

        foreach ($json->regular_hours ?? [] as $regularHours) {
            $hours->addRegularHours(RegularHoursFactory::fromJson($regularHours));
        }

        foreach ($json->exceptional_openings ?? [] as $exceptionalOpening) {
            $hours->addExceptionalOpening(ExceptionalPeriodFactory::fromJson($exceptionalOpening));
        }

        foreach ($json->exceptional_closings ?? [] as $exceptionalClosing) {
            $hours->addExceptionalClosing(ExceptionalPeriodFactory::fromJson($exceptionalClosing));
        }

        return $hours;
    }
}