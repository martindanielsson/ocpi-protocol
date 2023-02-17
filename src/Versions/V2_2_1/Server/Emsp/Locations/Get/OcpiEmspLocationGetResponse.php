<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Get;

use Chargemap\OCPI\Common\Server\OcpiSuccessResponse;
use Chargemap\OCPI\Common\Server\StatusCodes\OcpiSuccessHttpCode;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CdrLocation;

class OcpiEmspLocationGetResponse extends OcpiSuccessResponse
{
    private CdrLocation $location;

    public function __construct(CdrLocation $location, string $statusMessage = null)
    {
        parent::__construct(OcpiSuccessHttpCode::HTTP_OK(), $statusMessage);
        $this->location = $location;
    }

    protected function getData(): CdrLocation
    {
        return $this->location;
    }
}
