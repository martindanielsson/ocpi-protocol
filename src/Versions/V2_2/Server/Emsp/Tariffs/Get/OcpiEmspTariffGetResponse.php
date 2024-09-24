<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Tariffs\Get;

use Chargemap\OCPI\Common\Server\OcpiSuccessResponse;
use Chargemap\OCPI\Common\Server\StatusCodes\OcpiSuccessHttpCode;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Tariff;

class OcpiEmspTariffGetResponse extends OcpiSuccessResponse
{
    private Tariff $tariff;

    public function __construct(Tariff $tariff, string $statusMessage = null)
    {
        parent::__construct(OcpiSuccessHttpCode::HTTP_OK(), $statusMessage);
        $this->tariff = $tariff;
    }

    protected function getData(): Tariff
    {
        return $this->tariff;
    }
}
