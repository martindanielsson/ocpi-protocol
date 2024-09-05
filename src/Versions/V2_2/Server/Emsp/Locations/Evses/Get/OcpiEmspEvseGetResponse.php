<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Evses\Get;

use Chargemap\OCPI\Common\Server\OcpiSuccessResponse;
use Chargemap\OCPI\Common\Server\StatusCodes\OcpiSuccessHttpCode;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Evse;

class OcpiEmspEvseGetResponse extends OcpiSuccessResponse
{
    private Evse $evse;

    public function __construct(Evse $evse, string $statusMessage = null)
    {
        parent::__construct(OcpiSuccessHttpCode::HTTP_OK(), $statusMessage);
        $this->evse = $evse;
    }

    protected function getData(): Evse
    {
        return $this->evse;
    }
}
