<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\Put;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Evse;

class OcpiEmspEvsePutExistingResponse extends OcpiUpdateResponse
{
    private Evse $evse;

    public function __construct(Evse $evse, string $statusMessage = 'Evse successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->evse = $evse;
    }

    protected function getData()
    {
        return null;
    }
}
