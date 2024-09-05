<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
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
        Token $token,
        DateTime $expiryDate,
        string $reservationId,
        string $locationId,
        ?string $evseUid,
        ?string $authorizationReference
    ) {
        $this->responseUrl = $responseUrl;
        $this->token = $token;
        $this->expiryDate = $expiryDate;
        $this->reservationId = $reservationId;
        $this->locationId = $locationId;
        $this->evseUid = $evseUid;
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

    public function getExpiryDate(): DateTime
    {
        return $this->expiryDate;
    }

    public function getReservationId(): string
    {
        return $this->reservationId;
    }

    public function getLocationId(): string
    {
        return $this->locationId;
    }

    public function getEvseUid(): ?string
    {
        return $this->evseUid;
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
            'expiry_date' => DateTimeFormatter::format($this->expiryDate),
            'reservation_id' => $this->reservationId,
            'location_id' => $this->locationId,
            'evse_uid' => $this->evseUid,
            'authorization_reference' => $this->authorizationReference
        ];
    }
}