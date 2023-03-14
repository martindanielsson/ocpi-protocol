<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Commands\Post;

use Chargemap\OCPI\Common\Server\OcpiSuccessResponse;
use Chargemap\OCPI\Common\Server\StatusCodes\OcpiSuccessHttpCode;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandResult;

class OcpiEmspCommandPostResponse extends OcpiSuccessResponse
{
    private CommandResult $commandResult;

    public function __construct(CommandResult $commandResult, string $statusMessage = null)
    {
        parent::__construct(OcpiSuccessHttpCode::HTTP_OK(), $statusMessage);
        $this->commandResult = $commandResult;
    }

    protected function getData()
    {
        return null;
    }
}
