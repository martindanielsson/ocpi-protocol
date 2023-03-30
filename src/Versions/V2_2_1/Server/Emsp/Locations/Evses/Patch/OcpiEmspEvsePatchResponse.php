<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\Patch;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialEvse;

class OcpiEmspEvsePatchResponse extends OcpiUpdateResponse
{
    private PartialEvse $partialEvse;

    public function __construct(PartialEvse $partialEvse, string $statusMessage = 'Evse successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->partialEvse = $partialEvse;
    }

    protected function getData()
    {
        return null;
    }
}
