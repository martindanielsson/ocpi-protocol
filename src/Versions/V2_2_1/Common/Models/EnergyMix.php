<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class EnergyMix implements JsonSerializable
{
    private bool $isGreenEnergy;
    /** @var EnergySource[] */
    private array $energySources = [];
    /** @var EnvironmentalImpact[] */
    private array $environImpact = [];
    private ?string $supplierName;
    private ?string $energyProductName;

    public function __construct(
        bool $isGreenEnergy,
        ?string $supplierName,
        ?string $energyProductName
    ) {
        $this->isGreenEnergy = $isGreenEnergy;
        $this->supplierName = $supplierName;
        $this->energyProductName = $energyProductName;
    }

    public function addEnergySource(EnergySource $energySource): void
    {
        $this->energySources[] = $energySource;
    }

    public function addEnvironImpact(EnvironmentalImpact $environImpact): void
    {
        $this->environImpact[] = $environImpact;
    }

    public function getIsGreenEnergy(): bool
    {
        return $this->isGreenEnergy;
    }

    public function getEnergySources(): array
    {
        return $this->energySources;
    }

    public function getEnvironImpact(): array
    {
        return $this->environImpact;
    }

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function getEnergyProductName(): ?string
    {
        return $this->energyProductName;
    }

    public function jsonSerialize(): array
    {
        return [
            'is_green_energy' => $this->isGreenEnergy,
            'energy_sources' => $this->energySources,
            'environ_impact' => $this->environImpact,
            'supplier_name' => $this->supplierName,
            'energy_product_name' => $this->energyProductName
        ];
    }
}
