<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;

class StopSession implements \JsonSerializable, CommandsTypeInterface
{
    private string $responseUrl;

    private string $sessionId;

    public function __construct(string $responseUrl, string $sessionId)
    {
        $this->responseUrl = $responseUrl;
        $this->sessionId = $sessionId;
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