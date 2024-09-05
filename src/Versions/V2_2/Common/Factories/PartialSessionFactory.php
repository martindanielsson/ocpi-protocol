<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\AuthMethod;
use Chargemap\OCPI\Versions\V2_2\Common\Models\PartialSession;
use Chargemap\OCPI\Versions\V2_2\Common\Models\SessionStatus;
use DateTime;
use stdClass;

class PartialSessionFactory
{
    public static function fromJson(?stdClass $json): ?PartialSession
    {
        if ($json === null) {
            return null;
        }

        $session = new PartialSession();

        if (isset($json->country_code)) {
            $session->withCountryCode($json->country_code);
        }
        if (isset($json->party_id)) {
            $session->withPartyId($json->party_id);
        }
        if (isset($json->id)) {
            $session->withId($json->id);
        }
        if (isset($json->start_date_time)) {
            $session->withStartDateTime(new DateTime($json->start_date_time));
        }
        if (isset($json->end_date_time)) {
            $session->withEndDateTime(!empty($json->end_date_time) ? new DateTime($json->end_date_time) : null);
        }
        if (isset($json->kwh)) {
            $session->withKwh($json->kwh);
        }
        if (isset($json->cdr_token)) {
            $session->withCdrToken(CdrTokenFactory::fromJson($json->cdr_token));
        }
        if (isset($json->auth_method)) {
            $session->withAuthMethod(new AuthMethod($json->auth_method));
        }
        if (isset($json->authorization_reference)) {
            $session->withAuthorizationReference($json->authorization_reference);
        }
        if (isset($json->location_id)) {
            $session->withLocationId($json->location_id);
        }
        if (isset($json->evse_uid)) {
            $session->withEvseUid($json->evse_uid);
        }
        if (isset($json->connector_id)) {
            $session->withConnectorId($json->connector_id);
        }
        if (isset($json->meter_id)) {
            $session->withMeterId($json->meter_id);
        }
        if (isset($json->currency)) {
            $session->withCurrency($json->currency);
        }
        if (isset($json->total_cost)) {
            $session->withTotalCost(PriceFactory::fromJson($json->total_cost));
        }
        if (isset($json->status)) {
            $session->withStatus(new SessionStatus($json->status));
        }
        if (isset($json->last_updated)) {
            $session->withLastUpdated(new DateTime($json->last_updated));
        }

        if (isset($json->charging_periods)) {
            $session->withChargingPeriods();
            foreach ($json->charging_periods ?? [] as $chargingPeriod) {
                $session->addChargingPeriod(ChargingPeriodFactory::fromJson($chargingPeriod));
            }
        }

        return $session;
    }
}