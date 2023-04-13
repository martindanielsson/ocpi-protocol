<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ConnectorFormat;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ConnectorType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialConnector;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PowerType;
use DateTime;
use stdClass;

class PartialConnectorFactory
{
    public static function fromJson(?stdClass $json): ?PartialConnector
    {
        if ($json === null) {
            return null;
        }

        $connector = new PartialConnector();

        if (isset($json->id)) {
            $connector->withId($json->id);
        }
        if (isset($json->standard)) {
            $connector->withStandard(new ConnectorType($json->standard));
        }
        if (isset($json->format)) {
            $connector->withFormat(new ConnectorFormat($json->format));
        }
        if (isset($json->power_type)) {
            $connector->withPowerType(new PowerType($json->power_type));
        }
        if (isset($json->max_voltage)) {
            $connector->withMaxVoltage($json->max_voltage);
        }
        if (isset($json->max_amperage)) {
            $connector->withMaxAmperage($json->max_amperage);
        }
        if (isset($json->max_electric_power)) {
            $connector->withMaxElectricPower($json->max_electric_power);
        }
        if (isset($json->terms_and_conditions)) {
            $connector->withTermsAndConditions($json->terms_and_conditions);
        }
        if (isset($json->last_updated)) {
            $connector->withLastUpdated(new DateTime($json->last_updated));
        }

        if (isset($json->tariff_ids)) {
            $connector->withTariffIds();
            foreach ($json->tariff_ids ?? [] as $tariffId) {
                $connector->addTariffId($tariffId);
            }
        }

        return $connector;
    }
}
