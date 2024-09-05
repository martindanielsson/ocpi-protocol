<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\EnergyContract;
use stdClass;

class EnergyContractFactory
{
    public static function fromJson(?stdClass $json): ?EnergyContract
    {
        if ($json === null) {
            return null;
        }

        return new EnergyContract(
            $json->supplier_name,
            $json->contract_id ?? null
        );
    }
}