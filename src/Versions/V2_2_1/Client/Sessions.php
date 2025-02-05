<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\GetListing\GetSessionsListingRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\GetListing\GetSessionsListingResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\GetListing\GetSessionsListingService;

class Sessions extends AbstractFeatures
{

    /**
     * @param GetSessionsListingRequest|null $listingRequest
     * @return GetSessionsListingResponse
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiUnauthorizedException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getListing(?GetSessionsListingRequest $listingRequest = null): GetSessionsListingResponse
    {
        if ($listingRequest === null) {
            $listingRequest = new GetSessionsListingRequest();
        }

        return (new GetSessionsListingService($this->ocpiConfiguration))->handle($listingRequest);
    }
}
