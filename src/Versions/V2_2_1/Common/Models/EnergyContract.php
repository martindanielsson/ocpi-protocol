<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

class EnergyContract implements \JsonSerializable
{
    private string $supplierName;

    private ?string $contractId;

    public function __construct(string $supplierName, ?string $contractId)
    {
        $this->supplierName = $supplierName;
        $this->contractId = $contractId;
    }

    public function jsonSerialize(): array
    {
        $return = ['supplier_name' => $this->supplierName];

        if ($this->contractId !== null) {
            $return['contract_id'] = $this->contractId;
        }

        return $return;
    }

    /**
     * @return string
     */
    public function getSupplierName(): string
    {
        return $this->supplierName;
    }

    /**
     * @return string|null
     */
    public function getContractId(): ?string
    {
        return $this->contractId;
    }
}