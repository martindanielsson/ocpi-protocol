<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Facility;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ParkingType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialLocation;
use DateTime;
use stdClass;

class PartialLocationFactory
{
    public static function fromJson(?stdClass $json): ?PartialLocation
    {
        if ($json === null) {
            return null;
        }

        $location = new PartialLocation();

        if (isset($json->country_code)) {
            $location->withCountryCode($json->country_code);
        }
        if (isset($json->party_id)) {
            $location->withPartyId($json->party_id);
        }
        if (isset($json->id)) {
            $location->withId($json->id);
        }
        if (isset($json->publish)) {
            $location->withPublish($json->publish);
        }
        if (isset($json->name)) {
            $location->withName($json->name);
        }
        if (isset($json->address)) {
            $location->withAddress($json->address);
        }
        if (isset($json->city)) {
            $location->withCity($json->city);
        }
        if (isset($json->postal_code)) {
            $location->withPostalCode($json->postal_code);
        }
        if (isset($json->state)) {
            $location->withState($json->state);
        }
        if (isset($json->country)) {
            $location->withCountry($json->country);
        }
        if (isset($json->coordinates)) {
            $location->withCoordinates(GeoLocationFactory::fromJson($json->coordinates));
        }
        if (isset($json->parking_type)) {
            $location->withParkingType(new ParkingType($json->parking_type));
        }
        if (isset($json->operator)) {
            $location->withOperator(BusinessDetailsFactory::fromJson($json->operator));
        }
        if (isset($json->suboperator)) {
            $location->withSuboperator(BusinessDetailsFactory::fromJson($json->suboperator));
        }
        if (isset($json->owner)) {
            $location->withOwner(BusinessDetailsFactory::fromJson($json->owner));
        }
        if (isset($json->time_zone)) {
            $location->withTimeZone($json->time_zone);
        }
        if (isset($json->opening_times)) {
            $location->withOpeningTimes(HoursFactory::fromJson($json->opening_times));
        }
        if (isset($json->charging_when_closed)) {
            $location->withChargingWhenClosed($json->charging_when_closed);
        }
        if (isset($json->energy_mix)) {
            $location->withEnergyMix(EnergyMixFactory::fromJson($json->energy_mix));
        }
        if (isset($json->last_updated)) {
            $location->withLastUpdated(new DateTime($json->last_updated));
        }

        if (isset($json->publish_allowed_to)) {
            $location->withPublishAllowedTo();
            foreach ($json->publish_allowed_to ?? [] as $publishAllowedTo) {
                $location->addPublishAllowedTo(PublishTokenTypeFactory::fromJson($publishAllowedTo));
            }
        }

        if (isset($json->related_locations)) {
            $location->withRelatedLocations();
            foreach ($json->related_locations ?? [] as $relatedLocation) {
                $location->addRelatedLocation(AdditionalGeoLocationFactory::fromJson($relatedLocation));
            }
        }

        if (isset($json->evses)) {
            $location->withEvses();
            foreach ($json->evses ?? [] as $evse) {
                $location->addEvse(EvseFactory::fromJson($evse));
            }
        }

        if (isset($json->directions)) {
            $location->withDirections();
            foreach ($json->directions ?? [] as $direction) {
                $location->addDirection(DisplayTextFactory::fromJson($direction));
            }
        }

        if (isset($json->facilities)) {
            $location->withFacilities();
            foreach ($json->facilities ?? [] as $facility) {
                $location->addFacility(new Facility($facility));
            }
        }

        if (isset($json->images)) {
            $location->withImages();
            foreach ($json->images ?? [] as $image) {
                $location->addImage(ImageFactory::fromJson($image));
            }
        }

        return $location;
    }
}
