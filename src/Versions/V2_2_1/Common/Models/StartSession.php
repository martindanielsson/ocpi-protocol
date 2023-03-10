<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\TokenFactory;
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
        \stdClass $token,
        string $locationId,
        ?string $evseUid,
        ?string $connectorId,
        ?string $authorizationReference
    ) {
        $this->responseUrl = $responseUrl;
        $this->token = TokenFactory::fromJson($token);
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
        $this->connectorId = $connectorId;
        $this->authorizationReference = $authorizationReference;
    }

    /**
     * @return string
     */
    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    /**
     * @return Token
     */
    public function getToken(): Token
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @return string|null
     */
    public function getEvseUid(): ?string
    {
        return $this->evseUid;
    }

    /**
     * @return string|null
     */
    public function getConnectorId(): ?string
    {
        return $this->connectorId;
    }

    /**
     * @return string|null
     */
    public function getAuthorizationReference(): ?string
    {
        return $this->authorizationReference;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'response_url' => $this->responseUrl,
            'token' => $this->token,
            'location_id' => $this->locationId,
        ];

        if ($this->evseUid !== null) {
            $return['evse_uid'] = $this->evseUid;
        }

        if ($this->connectorId !== null) {
            $return['connector_id'] = $this->connectorId;
        }

        if ($this->authorizationReference !== null) {
            $return['authorization_reference'] = $this->authorizationReference;
        }

        return $return;
    }
}