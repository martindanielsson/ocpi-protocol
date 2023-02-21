<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Commands;

use Chargemap\OCPI\Common\Client\OcpiVersion;
use Chargemap\OCPI\Common\Models\BaseModuleId;
use Chargemap\OCPI\Versions\V2_2_1\Client\VersionTrait;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CancelReservation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CommandType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ModuleId;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ReserveNow;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\StartSession;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\StopSession;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\UnlockConnector;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

class PostCommandsRequest extends \Chargemap\OCPI\Common\Client\Modules\Commands\PostCommandsRequest
{
    use VersionTrait;

    private CommandType $commandType;
    private CommandsTypeInterface $commandData;

    public function __construct(CommandType $commandType, CommandsTypeInterface $commandData) {
        $this->commandType = $commandType;
        $this->commandData = $commandData;
    }

    public function getModule(): BaseModuleId
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
            ->withBody($streamFactory->createStream(json_encode($this->commandData)));
    }
}