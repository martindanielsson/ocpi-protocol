<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Put;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Location;

class OcpiEmspLocationPutExistingResponse extends OcpiUpdateResponse
{
    private Location $location;

    public function __construct(Location $location, string $statusMessage = 'Location successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->location = $location;
    }

    protected function getData()
    {
        return null;
    }
}
