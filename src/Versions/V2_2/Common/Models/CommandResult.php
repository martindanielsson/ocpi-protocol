<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class CommandResult implements JsonSerializable
{
    private CommandResultType $result;
    /** @var DisplayText[] */
    private array $message;

    public function __construct(
        CommandResultType $result
    ) {
        $this->result = $result;
        $this->message = [];
    }

    public function addMessage(DisplayText $message): self
    {
        $this->message[] = $message;
        return $this;
    }

    public function getResult(): CommandResultType
    {
        return $this->result;
    }

    public function getMessage(): array
    {
        return $this->message;
    }

    public function jsonSerialize(): array
    {
        return [
            'result' => $this->result,
            'message' => $this->message
        ];
    }
}
