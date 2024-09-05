<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Commands;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandType;

trait CommandRequestTrait
{
    protected CommandType $commandType;

    protected ?string $commandId;

    public function getCommandType(): CommandType
    {
        return $this->commandType;
    }

    public function getCommandId(): ?string
    {
        return $this->commandId;
    }

    protected function dispatchParams(string $commandType, ?string $commandId = null)
    {
        if (empty($commandType) || !in_array($commandType, CommandType::values())) {
            throw new OcpiGenericClientError('Unsupported command type');
        }

        $this->commandType = new CommandType($commandType);
        $this->commandId = $commandId;
    }
}
