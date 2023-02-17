<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Put;

use Chargemap\OCPI\Common\Server\OcpiCreateResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\CdrLocation;

class OcpiEmspLocationPutResponse extends OcpiCreateResponse
{
    private CdrLocation $location;

    public function __construct(CdrLocation $location, string $statusMessage = 'Location successfully created.')
    {
        parent::__construct($statusMessage);
        $this->location = $location;
    }

    protected function getData()
    {
        return null;
    }
}
