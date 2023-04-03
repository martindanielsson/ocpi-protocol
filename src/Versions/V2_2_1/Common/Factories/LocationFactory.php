<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Facility;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Location;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ParkingType;
use DateTime;
use stdClass;

class LocationFactory
{
    public static function fromJson(?stdClass $json): ?Location
    {
        if ($json === null) {
            return null;
        }

        $location = new Location(
            $json->country_code,
            $json->party_id,
            $json->id,
            $json->publish,
            $json->name ?? null,
            $json->address,
            $json->city,
            $json->postal_code ?? null,
            $json->state ?? null,
            $json->country,
            GeoLocationFactory::fromJson($json->coordinates),
            !empty($json->parking_type) ? new ParkingType($json->parking_type) : null,
            BusinessDetailsFactory::fromJson($json->operator ?? null),
            BusinessDetailsFactory::fromJson($json->suboperator ?? null),
            BusinessDetailsFactory::fromJson($json->owner ?? null),
            $json->time_zone,
            HoursFactory::fromJson($json->opening_times ?? null),
            $json->charging_when_closed ?? null,
            EnergyMixFactory::fromJson($json->energy_mix ?? null),
            new DateTime($json->last_updated)
        );

        foreach ($json->publish_allowed_to ?? [] as $publishAllowedTo) {
            $location->addPublishAllowedTo(PublishTokenTypeFactory::fromJson($publishAllowedTo));
        }

        foreach ($json->related_locations ?? [] as $relatedLocation) {
            $location->addRelatedLocation(AdditionalGeoLocationFactory::fromJson($relatedLocation));
        }

        foreach ($json->evses ?? [] as $evse) {
            $location->addEvse(EvseFactory::fromJson($evse));
        }

        foreach ($json->directions ?? [] as $direction) {
            $location->addDirection(DisplayTextFactory::fromJson($direction));
        }

        foreach ($json->facilities ?? [] as $facility) {
            $location->addFacility(new Facility($facility));
        }

        foreach ($json->images ?? [] as $image) {
            $location->addImage(ImageFactory::fromJson($image));
        }

        return $location;
    }
}
