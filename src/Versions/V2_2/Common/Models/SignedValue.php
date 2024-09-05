<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class SignedValue implements JsonSerializable
{
    private string $nature;
    private string $plainData;
    private string $signedData;

    public function __construct(
        string $nature,
        string $plainData,
        string $signedData
    ) {
        $this->nature = $nature;
        $this->plainData = $plainData;
        $this->signedData = $signedData;
    }

    public function getNature(): string
    {
        return $this->nature;
    }

    public function getplainData(): string
    {
        return $this->plainData;
    }

    public function getSignedData(): string
    {
        return $this->signedData;
    }

    public function jsonSerialize(): array
    {
        return [
            'nature' => $this->nature,
            'plain_data' => $this->plainData,
            'signed_data' => $this->signedData
        ];
    }
}