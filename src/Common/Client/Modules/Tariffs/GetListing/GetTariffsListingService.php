<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Client\Modules\Tariffs\GetListing;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\ServiceFactory;

class GetTariffsListingService extends AbstractFeatures
{
    /**
     * @param GetTariffsListingRequest $request
     * @return GetTariffsListingResponse
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiServiceNotFoundException
     * @throws \Chargemap\OCPI\Common\Client\OcpiUnauthorizedException
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function handle(GetTariffsListingRequest $request): GetTariffsListingResponse
    {
        $service = ServiceFactory::from($request, $this->ocpiConfiguration);

        return $service->handle($request);
    }
}
