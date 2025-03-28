<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Client\Cdrs\GetListing;

use Chargemap\OCPI\Common\Client\Modules\AbstractResponse;
use Chargemap\OCPI\Common\Client\OcpiUnauthorizedException;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\CdrFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Cdr;
use Psr\Http\Message\ResponseInterface;

class GetCdrsListingResponse extends AbstractResponse
{
    private ?GetCdrsListingRequest $nextRequest;

    /** @var Cdr[] */
    private array $cdrs = [];

    /**
     * @param GetCdrsListingRequest $request
     * @param ResponseInterface $response
     * @return GetCdrsListingResponse
     * @throws OcpiUnauthorizedException
     * @throws OcpiInvalidPayloadClientError
     */
    public static function from(GetCdrsListingRequest $request, ResponseInterface $response): GetCdrsListingResponse
    {
        if ($response->getStatusCode() === 401) {
            throw new OcpiUnauthorizedException();
        }

        $json = self::toJson($response, 'V2_2/eMSP/Client/CDRs/cdrGetResponse.schema.json');

        $return = new self();
        foreach ($json->data ?? [] as $item) {
            $return->cdrs[] = CdrFactory::fromJson($item);
        }

        $nextRequest = null;

        $nextOffset = $request->getNextOffset($response);
        $nextLimit = $request->getNextLimit($response);

        if ($nextOffset !== null) {
            $nextRequest = (clone $request)->withOffset($nextOffset);

            if($nextLimit !== null) {
                $nextRequest = $nextRequest->withLimit($nextLimit);
            }
        }

        $return->nextRequest = $nextRequest;

        return $return;
    }

    /** @return Cdr[] */
    public function getCdrs(): array
    {
        return $this->cdrs;
    }

    public function getNextRequest(): ?GetCdrsListingRequest
    {
        return $this->nextRequest;
    }
}