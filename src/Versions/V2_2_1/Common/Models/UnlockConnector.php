<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use JsonSerializable;

class UnlockConnector extends BaseCommand implements JsonSerializable
{
    private string $responseUrl;
    private string $locationId;
    private string $evseUid;
    private string $connectorId;

    public function __construct(
        string $responseUrl,
        string $locationId,
        string $evseUid,
        string $connectorId
    ) {
        $this->responseUrl = $responseUrl;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
    }

    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    public function getLocationId(): string
    {
        return $this->locationId;
    }

    public function getEvseUid(): ?string
    {
        return $this->evseUid;
    }

    public function getConnectorId(): ?string
    {
        return $this->connectorId;
    }

    public function jsonSerialize(): array
    {
        return [
            'response_url' => $this->responseUrl,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'connector_id' => $this->connectorId
        ];
    }
}