<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class Price implements JsonSerializable
{
    private float $excludingVat;
    private ?float $includingVat;

    public function __construct(
        float $excludingVat,
        ?float $includingVat
    ) {
        $this->excludingVat = $excludingVat;
        $this->includingVat = $includingVat;
    }

    public function getExcludingVat(): float
    {
        return $this->excludingVat;
    }

    public function getIncludingVat(): ?float
    {
        return $this->includingVat;
    }

    public function jsonSerialize(): array
    {
        return [
            'excl_vat' => $this->excludingVat,
            'incl_vat' => $this->includingVat
        ];
    }
}