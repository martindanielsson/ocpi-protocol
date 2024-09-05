<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Client\Commands\Post;

use Chargemap\OCPI\Common\Client\Modules\Commands\Post\PostCommandResponse as BaseResponse;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\CommandResponseFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\CommandResponse;
use Psr\Http\Message\ResponseInterface;

class PostCommandResponse extends BaseResponse
{
    private CommandResponse $commandResponse;

    public function __construct(CommandResponse $commandResponse)
    {
        $this->commandResponse = $commandResponse;
    }

    public function getCommandResponse(): CommandResponse
    {
        return $this->commandResponse;
    }

    /**
     * @throws OcpiInvalidPayloadClientError
     */
    public static function from(ResponseInterface $response): PostCommandResponse
    {
        $json = self::toJson($response, 'V2_2/eMSP/Client/Commands/commandPostResponse.schema.json');

        $commandResponse = CommandResponseFactory::fromJson($json->data);

        return new self($commandResponse);
    }
}
