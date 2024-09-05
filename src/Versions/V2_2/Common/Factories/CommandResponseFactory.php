<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResponse;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResponseType;
use stdClass;

class CommandResponseFactory
{
    public static function fromJson(?stdClass $json): ?CommandResponse
    {
        if ($json === null) {
            return null;
        }

        $commandResponse = new CommandResponse(
            new CommandResponseType($json->result),
            $json->timeout
        );

        foreach ($json->message ?? [] as $message) {
            $commandResponse->addMessage(DisplayTextFactory::fromJson($message));
        }

        return $commandResponse;
    }
}
