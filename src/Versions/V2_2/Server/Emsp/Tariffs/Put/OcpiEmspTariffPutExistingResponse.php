<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Tariffs\Put;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Tariff;

class OcpiEmspTariffPutExistingResponse extends OcpiUpdateResponse
{
    private Tariff $tariff;

    public function __construct(Tariff $tariff, string $statusMessage = 'Tariff successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->tariff = $tariff;
    }

    protected function getData()
    {
        return null;
    }
}
