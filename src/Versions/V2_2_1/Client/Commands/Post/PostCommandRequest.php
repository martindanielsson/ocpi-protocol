<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post;

use Chargemap\OCPI\Common\Client\Modules\Commands\Post\PostCommandRequest as BaseRequest;
use Chargemap\OCPI\Common\Models\BaseCommand;
use Chargemap\OCPI\Versions\V2_2_1\Client\VersionTrait;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ModuleId;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

class PostCommandRequest extends BaseRequest
{
    use VersionTrait;

    private CommandType $commandType;
    private BaseCommand $command;

    public function __construct(CommandType $commandType, BaseCommand $command)
    {
        $this->commandType = $commandType;
        $this->command = $command;
    }

    public function getModule(): ModuleId
    {
        return ModuleId::COMMANDS();
    }

    public function getServerRequestInterface(ServerRequestFactoryInterface $serverRequestFactory, ?StreamFactoryInterface $streamFactory): ServerRequestInterface
    {
        if ($streamFactory === null) {
            $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        }

        return $serverRequestFactory->createServerRequest('POST',
            '/' . $this->commandType)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($streamFactory->createStream(json_encode($this->command)));
    }
}