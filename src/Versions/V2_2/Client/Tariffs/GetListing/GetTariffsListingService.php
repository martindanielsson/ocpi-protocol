<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Client\Tariffs\GetListing;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Versions\V2_2\Client\Tariffs\GetListing\GetTariffsListingRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Tariffs\GetListing\GetTariffsListingResponse;

class GetTariffsListingService extends AbstractFeatures
{
    /**
     * @param GetTariffsListingRequest $request
     * @return GetTariffsListingResponse
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Chargemap\OCPI\Common\Client\OcpiUnauthorizedException
     */
    public function handle(GetTariffsListingRequest $request): GetTariffsListingResponse
    {
        $responseInterface = $this->sendRequest($request);
        return GetTariffsListingResponse::from($request, $responseInterface);
    }
}
