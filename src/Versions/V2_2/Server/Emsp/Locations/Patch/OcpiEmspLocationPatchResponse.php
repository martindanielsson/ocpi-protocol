<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Patch;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2\Common\Models\PartialLocation;

class OcpiEmspLocationPatchResponse extends OcpiUpdateResponse
{
    private PartialLocation $partialLocation;

    public function __construct(PartialLocation $partialLocation, string $statusMessage = 'Location successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->partialLocation = $partialLocation;
    }

    protected function getData()
    {
        return null;
    }
}
