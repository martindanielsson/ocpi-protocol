<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;

class UnlockConnector implements \JsonSerializable, CommandsTypeInterface
{
    private string $responseUrl;
    private string $locationId;
    private string $evseUid;
    private string $connectorId;

    public function __construct(string $responseUrl, string $locationId, string $evseUid, string $connectorId)
    {
        $this->responseUrl = $responseUrl;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
    }

    /**
     * @return string
     */
    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @return string
     */
    public function getEvseUid(): string
    {
        return $this->evseUid;
    }

    /**
     * @return string
     */
    public function getConnectorId(): string
    {
        return $this->connectorId;
    }

    public function jsonSerialize(): array
    {
        return [
            'response_url' => $this->responseUrl,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'connector_id' => $this->connectorId,
        ];
    }
}