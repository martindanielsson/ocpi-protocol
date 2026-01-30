<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\Modules\Credentials\Register\ClientAlreadyRegisteredException;
use Chargemap\OCPI\Common\Client\Modules\Credentials\Update\ClientNotRegisteredException;
use Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Register\RegisterCredentialsRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Register\RegisterCredentialsResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Register\RegisterCredentialsService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Update\UpdateCredentialsRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Update\UpdateCredentialsResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Update\UpdateCredentialsService;
use Psr\Http\Client\ClientExceptionInterface;

class Credentials extends AbstractFeatures
{
    private ?RegisterCredentialsService $registerCredentialsService = null;
    private ?UpdateCredentialsService $updateCredentialsService = null;

    /**
     * @throws ClientExceptionInterface
     * @throws OcpiEndpointNotFoundException
     * @throws OcpiInvalidPayloadClientError
     * @throws ClientAlreadyRegisteredException
     */
    public function register(RegisterCredentialsRequest $request): RegisterCredentialsResponse
    {
        if ($this->registerCredentialsService === null) {
            $this->registerCredentialsService = new RegisterCredentialsService($this->ocpiConfiguration);
        }

        return $this->registerCredentialsService->handle($request);
    }

    /**
     * @throws ClientNotRegisteredException
     * @throws OcpiEndpointNotFoundException
     * @throws OcpiInvalidPayloadClientError
     * @throws ClientExceptionInterface
     */
    public function update(UpdateCredentialsRequest $request): UpdateCredentialsResponse
    {
        if ($this->updateCredentialsService === null) {
            $this->updateCredentialsService = new UpdateCredentialsService($this->ocpiConfiguration);
        }

        return $this->updateCredentialsService->handle($request);
    }
}