<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Get;

use Chargemap\OCPI\Common\Server\OcpiBaseRequest;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\LocationRequestParams;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\LocationRequestTrait;
use Psr\Http\Message\ServerRequestInterface;

class OcpiEmspLocationGetRequest extends OcpiBaseRequest
{
    use LocationRequestTrait;

    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request);
        $this->dispatchParams($params);
    }
}
