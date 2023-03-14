<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandResult;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandResultType;
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

        if (property_exists($json, 'message') && $json->message !== null) {
            foreach ($json->message as $jsonMessage) {
                $commandResult->addMessage(DisplayTextFactory::fromJson($jsonMessage));
            }
        }

        return $commandResult;
    }
}
