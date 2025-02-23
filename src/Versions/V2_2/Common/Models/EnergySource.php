<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class EnergySource implements JsonSerializable
{
    private EnergySourceCategory $source;
    private float $percentage;

    public function __construct(
        EnergySourceCategory $source,
        float $percentage
    ) {
        $this->source = $source;
        $this->percentage = $percentage;
    }

    public function getSource(): EnergySourceCategory
    {
        return $this->source;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function jsonSerialize(): array
    {
        return [
            'source' => $this->source,
            'percentage' => $this->percentage
        ];
    }
}
