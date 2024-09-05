<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class CdrToken implements JsonSerializable
{
    private string $uid;
    private TokenType $type;
    private string $contractId;

    public function __construct(
        string $uid,
        TokenType $type,
        string $contractId
    ) {
        $this->uid = $uid;
        $this->type = $type;
        $this->contractId = $contractId;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getType(): TokenType
    {
        return $this->type;
    }

    public function getContractId(): string
    {
        return $this->contractId;
    }

    public function jsonSerialize(): array
    {
        return [
            'uid' => $this->uid,
            'type' => $this->type,
            'contract_id' => $this->contractId
        ];
    }
}