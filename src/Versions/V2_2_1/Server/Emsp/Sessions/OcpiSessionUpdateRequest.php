<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions;

use Chargemap\OCPI\Common\Server\OcpiUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;

abstract class OcpiSessionUpdateRequest extends OcpiUpdateRequest
{
    use SessionRequestTrait;

    protected function __construct(ServerRequestInterface $request, string $countryCode, string $partyId, string $sessionId)
    {
        parent::__construct($request);
        $this->dispatchParams($countryCode, $partyId, $sessionId);
    }
}
