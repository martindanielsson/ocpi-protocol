<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\PutChargingPreferences;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;

class PutChargingPreferencesService extends AbstractFeatures
{
    /**
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function handle(PutChargingPreferencesRequest $request): PutChargingPreferencesResponse
    {
        $responseInterface = $this->sendRequest($request);

        return PutChargingPreferencesResponse::from($responseInterface);
    }
}