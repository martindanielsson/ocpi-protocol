<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Capability;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Status;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ParkingRestriction;
use Chargemap\OCPI\Versions\V2_2\Common\Models\PartialEvse;
use DateTime;
use stdClass;

class PartialEvseFactory
{
    public static function fromJson(?stdClass $json): ?PartialEvse
    {
        if ($json === null) {
            return null;
        }

        $evse = new PartialEvse();

        if (isset($json->uid)) {
            $evse->withUid($json->uid);
        }
        if (isset($json->evse_id)) {
            $evse->withEvseId($json->evse_id);
        }
        if (isset($json->status)) {
            $evse->withStatus(new Status($json->status));
        }
        if (isset($json->floor_level)) {
            $evse->withFloorLevel($json->floor_level);
        }
        if (isset($json->coordinates)) {
            $evse->withCoordinates(GeoLocationFactory::fromJson($json->coordinates));
        }
        if (isset($json->physical_reference)) {
            $evse->withPhysicalReference($json->physical_reference);
        }
        if (isset($json->last_updated)) {
            $evse->withLastUpdated(new DateTime($json->last_updated));
        }

        if (isset($json->status_schedule)) {
            $evse->withStatusSchedule();
            foreach ($json->status_schedule ?? [] as $statusSchedule) {
                $evse->addStatusSchedule(StatusScheduleFactory::fromJson($statusSchedule));
            }
        }

        if (isset($json->capabilities)) {
            $evse->withCapabilities();
            foreach ($json->capabilities ?? [] as $capability) {
                $evse->addCapability(new Capability($capability));
            }
        }

        if (isset($json->connectors)) {
            $evse->withConnectors();
            foreach ($json->connectors ?? [] as $connector) {
                $evse->addConnector(ConnectorFactory::fromJson($connector));
            }
        }

        if (isset($json->directions)) {
            $evse->withDirections();
            foreach ($json->directions ?? [] as $direction) {
                $evse->addDirection(DisplayTextFactory::fromJson($direction));
            }
        }

        if (isset($json->parking_restrictions)) {
            $evse->withParkingRestrictions();
            foreach ($json->parking_restrictions ?? [] as $parkingRestriction) {
                $evse->addParkingRestriction(new ParkingRestriction($parkingRestriction));
            }
        }

        if (isset($json->images)) {
            $evse->withImages();
            foreach ($json->images ?? [] as $image) {
                $evse->addImage(ImageFactory::fromJson($image));
            }
        }

        return $evse;
    }
}
