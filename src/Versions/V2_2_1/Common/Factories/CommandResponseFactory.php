<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandResponseType;
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

        if (property_exists($json, 'message') && $json->message !== null) {
            foreach ($json->message as $jsonMessage) {
                $commandResponse->addMessage(DisplayTextFactory::fromJson($jsonMessage));
            }
        }

        return $commandResponse;
    }
}
