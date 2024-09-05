<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Capability;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Evse;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Status;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ParkingRestriction;
use DateTime;
use stdClass;

class EvseFactory
{
    public static function fromJson(?stdClass $json): ?Evse
    {
        if ($json === null) {
            return null;
        }

        $evse = new Evse(
            $json->uid,
            $json->evse_id ?? null,
            new Status($json->status),
            $json->floor_level ?? null,
            GeoLocationFactory::fromJson($json->coordinates ?? null),
            $json->physical_reference ?? null,
            new DateTime($json->last_updated)
        );

        foreach ($json->status_schedule ?? [] as $statusSchedule) {
            $evse->addStatusSchedule(StatusScheduleFactory::fromJson($statusSchedule));
        }

        foreach ($json->capabilities ?? [] as $capability) {
            $evse->addCapability(new Capability($capability));
        }

        foreach ($json->connectors ?? [] as $connector) {
            $evse->addConnector(ConnectorFactory::fromJson($connector));
        }

        foreach ($json->directions ?? [] as $direction) {
            $evse->addDirection(DisplayTextFactory::fromJson($direction));
        }

        foreach ($json->parking_restrictions ?? [] as $parkingRestriction) {
            $evse->addParkingRestriction(new ParkingRestriction($parkingRestriction));
        }

        foreach ($json->images ?? [] as $image) {
            $evse->addImage(ImageFactory::fromJson($image));
        }

        return $evse;
    }
}
