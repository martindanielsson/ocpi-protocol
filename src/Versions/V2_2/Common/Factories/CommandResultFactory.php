<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResult;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResultType;
use stdClass;

class CommandResultFactory
{
    public static function fromJson(?stdClass $json): ?CommandResult
    {
        if ($json === null) {
            return null;
        }

        $commandResult = new CommandResult(
            new CommandResultType($json->result)
        );

        foreach ($json->message ?? [] as $message) {
            $commandResult->addMessage(DisplayTextFactory::fromJson($message));
        }

        return $commandResult;
    }
}
