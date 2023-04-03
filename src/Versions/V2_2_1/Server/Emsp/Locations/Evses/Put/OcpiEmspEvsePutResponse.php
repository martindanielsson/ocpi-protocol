<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\Put;

use Chargemap\OCPI\Common\Server\OcpiCreateResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Evse;

class OcpiEmspEvsePutResponse extends OcpiCreateResponse
{
    private Evse $evse;

    public function __construct(Evse $evse, string $statusMessage = 'Evse successfully created.')
    {
        parent::__construct($statusMessage);
        $this->evse = $evse;
    }

    protected function getData()
    {
        return null;
    }
}
