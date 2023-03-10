<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Commands;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandType;

trait CommandRequestTrait
{
    protected CommandType $command;

    protected ?string $commandId;

    public function getCommand(): CommandType
    {
        return $this->command;
    }

    public function getCommandId(): ?string
    {
        return $this->commandId;
    }

    protected function dispatchParams(string $command, ?string $commandId = null)
    {
        if (empty($command) || !in_array($command, CommandType::values()) {
            throw new OcpiGenericClientError('Unsupported command');
        }

        $this->command = new CommandType($command);
        $this->commandId = $commandId;
    }
}
