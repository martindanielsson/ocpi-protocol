<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs;

use Chargemap\OCPI\Common\Server\OcpiUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;

abstract class OcpiTariffUpdateRequest extends OcpiUpdateRequest
{
    use TariffRequestTrait;

    protected function __construct(ServerRequestInterface $request, TariffRequestParams $params)
    {
        parent::__construct($request);
        $this->dispatchParams($params);
    }
}
