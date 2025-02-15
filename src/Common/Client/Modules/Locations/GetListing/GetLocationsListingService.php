<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Client\Modules\Locations\GetListing;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\ServiceFactory;

class GetLocationsListingService extends AbstractFeatures
{
    /**
     * @param GetLocationsListingRequest $request
     * @return GetLocationsListingResponse
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiServiceNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiUnauthorizedException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function handle(GetLocationsListingRequest $request): GetLocationsListingResponse
    {
        $service = ServiceFactory::from($request, $this->ocpiConfiguration);

        return $service->handle($request);
    }
}
