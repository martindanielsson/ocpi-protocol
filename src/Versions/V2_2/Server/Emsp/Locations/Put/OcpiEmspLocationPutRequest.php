<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Put;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\LocationFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Location;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\LocationRequestParams;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\OcpiLocationUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspLocationPutRequest extends OcpiLocationUpdateRequest
{
    private Location $location;

    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Locations/locationPutRequest.schema.json', $this->jsonBody);

        $location = LocationFactory::fromJson($this->jsonBody);

        if ($location === null) {
            throw new UnexpectedValueException('Location cannot be null');
        }

        if ($location->getId() !== $params->getLocationId()) {
            throw new OcpiGenericClientError('ID can not differ');
        }

        $this->location = $location;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}
