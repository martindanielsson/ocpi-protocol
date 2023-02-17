<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

class Price implements \JsonSerializable
{
    private float $excludeVat;

    private ?float $includeVat;

    public function __construct(float $excludeVat, ?float $includeVat)
    {
        $this->excludeVat = $excludeVat;
        $this->includeVat = $includeVat;
    }

    public function jsonSerialize(): array
    {
        return [
            'excl_vat' => $this->excludeVat,
            'incl_vat' => $this->includeVat,
        ];
    }

    /**
     * @return float
     */
    public function getExcludeVat(): float
    {
        return $this->excludeVat;
    }

    /**
     * @return float|null
     */
    public function getIncludeVat(): ?float
    {
        return $this->includeVat;
    }
}