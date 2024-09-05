<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Patch;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\PartialLocationFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\PartialLocation;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\LocationRequestParams;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\OcpiLocationUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspLocationPatchRequest extends OcpiLocationUpdateRequest
{
    private PartialLocation $partialLocation;

    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Locations/locationPatchRequest.schema.json', $this->jsonBody);

        $partialLocation = PartialLocationFactory::fromJson($this->jsonBody);

        if ($partialLocation === null) {
            throw new UnexpectedValueException('PartialLocation cannot be null');
        }

        if ($partialLocation->hasCountryCode() && $partialLocation->getCountryCode() !== $params->getCountryCode()) {
            throw new OcpiGenericClientError('Country code can not be patched');
        }

        if ($partialLocation->hasPartyId() && $partialLocation->getPartyId() !== $params->getPartyId()) {
            throw new OcpiGenericClientError('Party ID can not be patched');
        }

        if ($partialLocation->hasId() && $partialLocation->getId() !== $params->getLocationId()) {
            throw new OcpiGenericClientError('ID can not be patched');
        }

        $this->partialLocation = $partialLocation;
    }

    public function getPartialLocation(): PartialLocation
    {
        return $this->partialLocation;
    }
}
