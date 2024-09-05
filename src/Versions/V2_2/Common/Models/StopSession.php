<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use Chargemap\OCPI\Common\Models\BaseCommand;
use JsonSerializable;

class StopSession extends BaseCommand implements JsonSerializable
{
    private string $responseUrl;
    private string $sessionId;

    public function __construct(
        string $responseUrl,
        string $sessionId
    ) {
        $this->responseUrl = $responseUrl;
        $this->sessionId = $sessionId;
    }

    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function jsonSerialize(): array
    {
        return [
            'response_url' => $this->responseUrl,
            'session_id' => $this->sessionId
        ];
    }
}