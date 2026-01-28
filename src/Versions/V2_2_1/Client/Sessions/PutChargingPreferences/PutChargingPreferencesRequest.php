<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\PutChargingPreferences;

use Chargemap\OCPI\Common\Client\Modules\Sessions\PutChargingPreferences\PutChargingPreferencesRequest as BaseRequest;
use Chargemap\OCPI\Common\Models\BaseModuleId;
use Chargemap\OCPI\Versions\V2_2_1\Client\VersionTrait;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ChargingPreferences;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ModuleId;
use Http\Discovery\Psr17FactoryDiscovery;
use InvalidArgumentException;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

class PutChargingPreferencesRequest extends BaseRequest
{
    use VersionTrait;

    private string $sessionId;
    private ChargingPreferences $chargingPreferences;

    public function __construct(string $sessionId, ChargingPreferences $chargingPreferences)
    {
        if (empty($sessionId) || mb_strlen($sessionId) > 36) {
            throw new InvalidArgumentException('Session ID should contain less than 36 characters.');
        }

        $this->sessionId = $sessionId;
        $this->chargingPreferences = $chargingPreferences;
    }

    public function getModule(): BaseModuleId
    {
        return ModuleId::SESSIONS();
    }

    public function getServerRequestInterface(ServerRequestFactoryInterface $serverRequestFactory, ?StreamFactoryInterface $streamFactory): ServerRequestInterface
    {
        if ($streamFactory === null) {
            $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        }

        return $serverRequestFactory->createServerRequest('PUT','/' . $this->sessionId)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($streamFactory->createStream(json_encode($this->chargingPreferences->jsonSerialize())));
    }

}