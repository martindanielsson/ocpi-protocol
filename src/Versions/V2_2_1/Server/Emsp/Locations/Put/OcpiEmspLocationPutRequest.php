<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Put;

use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\CdrLocationFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CdrLocation;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\LocationRequestParams;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\OcpiLocationUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspLocationPutRequest extends OcpiLocationUpdateRequest
{
    private CdrLocation $location;

    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Locations/locationPutRequest.schema.json', $this->jsonBody);
        $location = CdrLocationFactory::fromJson($this->jsonBody);
        if ($location === null) {
            throw new UnexpectedValueException('Location cannot be null');
        }
        $this->location = $location;
    }

    public function getLocation(): CdrLocation
    {
        return $this->location;
    }
}
