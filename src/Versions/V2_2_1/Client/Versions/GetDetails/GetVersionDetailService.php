<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Versions\GetDetails;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;

class GetVersionDetailService extends AbstractFeatures
{
    /**
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidTokenClientError
     * @throws \Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError
     * @throws \Exception
     */
    public function get(GetVersionDetailRequest $request): GetVersionDetailResponse
    {
        $serverRequestInterface = $request->getServerRequestInterface($this->ocpiConfiguration->getServerRequestFactory());
        $serverRequestInterface = $this->addAuthorization($serverRequestInterface);
        $serverRequestInterface = $this->addRequestAndCorrelationHeaders($serverRequestInterface);
        $responseInterface = $this->ocpiConfiguration->getHttpClient()->sendRequest($serverRequestInterface);
        return GetVersionDetailResponse::fromResponseInterface($responseInterface);
    }
}
