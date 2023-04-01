<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class EnergyContract implements JsonSerializable
{
    private string $supplierName;
    private ?string $contractId;

    public function __construct(
        string $supplierName,
        ?string $contractId
    ) {
        $this->supplierName = $supplierName;
        $this->contractId = $contractId;
    }

    public function getSupplierName(): string
    {
        return $this->supplierName;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }


    public function jsonSerialize(): array
    {
        return [
            'supplier_name' => $this->supplierName,
            'contract_id' => $this->contractId
        ];
    }
}