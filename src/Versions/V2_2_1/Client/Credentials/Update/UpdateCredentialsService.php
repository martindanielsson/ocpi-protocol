<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Update;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\Modules\Credentials\Update\ClientNotRegisteredException;
use Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Psr\Http\Client\ClientExceptionInterface;

class UpdateCredentialsService extends AbstractFeatures
{
    /**
     * @throws ClientNotRegisteredException
     * @throws OcpiEndpointNotFoundException
     * @throws OcpiInvalidPayloadClientError
     * @throws ClientExceptionInterface
     */
    public function handle(UpdateCredentialsRequest $request): UpdateCredentialsResponse
    {
        $responseInterface = $this->sendRequest($request);

        return UpdateCredentialsResponse::fromResponseInterface($responseInterface);
    }
}