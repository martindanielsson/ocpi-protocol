<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\EnergyMix;
use stdClass;

class EnergyMixFactory
{
    public static function fromJson(?stdClass $json): ?EnergyMix
    {
        if ($json === null) {
            return null;
        }

        $energyMix = new EnergyMix(
            $json->is_green_energy,
            $json->supplier_name ?? null,
            $json->energy_product_name ?? null
        );

        foreach ($json->energy_sources ?? [] as $energySource) {
            $energyMix->addEnergySource(EnergySourceFactory::fromJson($energySource));
        }

        foreach ($json->environ_impact ?? [] as $environImpact) {
            $energyMix->addEnvironImpact(EnvironmentalImpactFactory::fromJson($environImpact));
        }

        return $energyMix;
    }
}
