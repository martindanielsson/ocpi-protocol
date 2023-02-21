<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;

class CancelReservation implements \JsonSerializable, CommandsTypeInterface
{
    private string $responseUrl;

    private string $reservationId;

    public function __construct(string $responseUrl, string $reservationId)
    {
        $this->responseUrl = $responseUrl;
        $this->reservationId = $reservationId;
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