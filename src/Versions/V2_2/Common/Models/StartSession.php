<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use JsonSerializable;

class StartSession extends BaseCommand implements JsonSerializable
{
    private string $responseUrl;
    private Token $token;
    private string $locationId;
    private ?string $evseUid;
    private ?string $connectorId;
    private ?string $authorizationReference;

    public function __construct(
        string $responseUrl,
        Token $token,
        string $locationId,
        ?string $evseUid,
        ?string $connectorId,
        ?string $authorizationReference
    ) {
        $this->responseUrl = $responseUrl;
        $this->token = $token;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
        $this->authorizationReference = $authorizationReference;
    }

    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    public function getToken(): Token
    {
        return $this->token;
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

    public function getAuthorizationReference(): ?string
    {
        return $this->authorizationReference;
    }

    public function jsonSerialize(): array
    {
        return [
            'response_url' => $this->responseUrl,
            'token' => $this->token,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'connector_id' => $this->connectorId,
            'authorization_reference' => $this->authorizationReference
        ];
    }
}