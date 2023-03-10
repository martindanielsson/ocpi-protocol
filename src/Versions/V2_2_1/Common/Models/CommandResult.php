<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class CommandResult implements JsonSerializable
{
    private CommandResultType $result;

    /** @var DisplayText[] */
    private array $message;

    public function __construct(CommandResultType $result)
    {
        $this->result = $result;
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
        $return = [
            'result' => $this->result
        ];

        if (count($this->message) > 0) {
            $return['message'] = $this->message;
        }

        return $return;
    }
}
