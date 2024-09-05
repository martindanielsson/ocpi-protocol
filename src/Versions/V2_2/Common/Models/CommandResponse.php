<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class CommandResponse implements JsonSerializable
{
    private CommandResponseType $result;
    private int $timeout;
    /** @var DisplayText[] */
    private array $message = [];

    public function __construct(
        CommandResponseType $result,
        int $timeout
    ) {
        $this->result = $result;
        $this->timeout = $timeout;
    }

    public function addMessage(DisplayText $message): self
    {
        $this->message[] = $message;
        return $this;
    }

    public function getResult(): CommandResponseType
    {
        return $this->result;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function getMessage(): array
    {
        return $this->message;
    }

    public function jsonSerialize(): array
    {
        return [
            'result' => $this->result,
            'timeout' => $this->timeout,
            'message' => $this->message
        ];
    }
}
