<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\TokenFactory;
use DateTime;
use JsonSerializable;

class ReserveNow extends BaseCommand implements JsonSerializable
{
    private string $responseUrl;
    private Token $token;
    private DateTime $expiryDate;
    private string $reservationId;
    private string $locationId;
    private ?string $evseUid;
    private ?string $authorizationReference;

    public function __construct(
        string $responseUrl,
        \stdClass $token,
        DateTime $expiryDate,
        string $reservationId,
        string $locationId,
        ?string $evseUid,
        ?string $authorizationReference
    ) {
        $this->responseUrl = $responseUrl;
        $this->token = TokenFactory::fromJson($token);
        $this->expiryDate = $expiryDate;
        $this->reservationId = $reservationId;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
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
     * @return DateTime
     */
    public function getExpiryDate(): DateTime
    {
        return $this->expiryDate;
    }

    /**
     * @return string
     */
    public function getReservationId(): string
    {
        return $this->reservationId;
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
    public function getAuthorizationReference(): ?string
    {
        return $this->authorizationReference;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'response_url' => $this->responseUrl,
            'token' => $this->token,
            'expiry_date' => $this->expiryDate,
            'reservation_id' => $this->reservationId,
            'location_id' => $this->locationId,
        ];

        if ($this->evseUid !== null) {
            $return['evse_uid'] = $this->evseUid;
        }

        if ($this->authorizationReference) {
            $return['authorization_reference'] = $this->authorizationReference;
        }

        return $return;
    }
}