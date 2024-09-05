<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use JsonSerializable;

class CancelReservation extends BaseCommand implements JsonSerializable
{
    private string $responseUrl;
    private string $reservationId;

    public function __construct(
        string $responseUrl,
        string $reservationId
    ) {
        $this->responseUrl = $responseUrl;
        $this->reservationId = $reservationId;
    }

    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    public function getReservationId(): string
    {
        return $this->reservationId;
    }

    public function jsonSerialize(): array
    {
        return [
            'response_url' => $this->responseUrl,
            'reservation_id' => $this->reservationId
        ];
    }
}