<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs\Get;

use Chargemap\OCPI\Common\Server\OcpiBaseRequest;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs\TariffRequestParams;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs\TariffRequestTrait;
use Psr\Http\Message\ServerRequestInterface;

class OcpiEmspTariffGetRequest extends OcpiBaseRequest
{
    use TariffRequestTrait;

    public function __construct(ServerRequestInterface $request, TariffRequestParams $params)
    {
        parent::__construct($request);
        $this->dispatchParams($params);
    }
}
