<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class PriceComponent implements JsonSerializable
{
    private TariffDimensionType $type;

    private float $price;

    private int $stepSize;

    private ?float $vat;

    public function __construct(TariffDimensionType $type, float $price, int $stepSize, ?float $vat)
    {
        $this->type = $type;
        $this->price = $price;
        $this->stepSize = $stepSize;
        $this->vat = $vat;
    }

    public function getType(): TariffDimensionType
    {
        return $this->type;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStepSize(): int
    {
        return $this->stepSize;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'type' => $this->type,
            'price' => $this->price,
            'step_size' => $this->stepSize
        ];

        if ($this->vat !== null) {
            $return['vat'] = $this->vat;
        }

        return $return;
    }
}