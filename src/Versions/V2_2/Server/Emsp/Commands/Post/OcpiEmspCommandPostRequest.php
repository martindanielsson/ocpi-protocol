<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Commands\Post;

use Chargemap\OCPI\Common\Server\OcpiUpdateRequest;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\CommandResultFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResult;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Commands\CommandRequestTrait;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspCommandPostRequest extends OcpiUpdateRequest
{
    use CommandRequestTrait;

    private CommandResult $commandResult;

    public function __construct(ServerRequestInterface $request, string $commandType, ?string $commandId = null)
    {
        parent::__construct($request);
        $this->dispatchParams($commandType, $commandId);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Commands/commandPostRequest.schema.json', $this->jsonBody);
        $commandResult = CommandResultFactory::fromJson($this->jsonBody);
        if ($commandResult === null) {
            throw new UnexpectedValueException('Command result cannot be null');
        }
        $this->commandResult = $commandResult;
    }

    public function getCommandResult(): CommandResult
    {
        return $this->commandResult;
    }
}
