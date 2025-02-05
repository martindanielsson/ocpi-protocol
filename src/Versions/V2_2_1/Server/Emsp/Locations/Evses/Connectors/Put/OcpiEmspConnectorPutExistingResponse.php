<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\Connectors\Put;

use Chargemap\OCPI\Common\Server\OcpiUpdateResponse;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Connector;

class OcpiEmspConnectorPutExistingResponse extends OcpiUpdateResponse
{
    private Connector $connector;

    public function __construct(Connector $connector, string $statusMessage = 'Connector successfully updated.')
    {
        parent::__construct($statusMessage);
        $this->connector = $connector;
    }

    protected function getData()
    {
        return null;
    }
}
