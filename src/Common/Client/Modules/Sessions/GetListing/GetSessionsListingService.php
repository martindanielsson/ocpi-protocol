<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Client\Modules\Sessions\GetListing;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\ServiceFactory;

class GetSessionsListingService extends AbstractFeatures
{
    /**
     * @param GetSessionsListingRequest $request
     * @return GetSessionsListingResponse
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiServiceNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiUnauthorizedException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function handle(GetSessionsListingRequest $request): GetSessionsListingResponse
    {
        $service = ServiceFactory::from($request, $this->ocpiConfiguration);

        return $service->handle($request);
    }
}
