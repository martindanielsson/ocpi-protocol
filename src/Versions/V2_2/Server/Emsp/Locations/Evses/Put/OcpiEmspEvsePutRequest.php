<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Evses\Put;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\EvseFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Evse;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\Evses\BaseEvseUpdateRequest;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Locations\LocationRequestParams;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspEvsePutRequest extends BaseEvseUpdateRequest
{
    private Evse $evse;

    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Locations/Evses/evsePutRequest.schema.json', $this->jsonBody);

        $evse = EvseFactory::fromJson($this->jsonBody);

        if ($evse === null) {
            throw new UnexpectedValueException('Evse cannot be null');
        }

        if ($evse->getUid() !== $params->getEvseUid()) {
            throw new OcpiGenericClientError('UID can not differ');
        }

        $this->evse = $evse;
    }

    public function getEvse(): Evse
    {
        return $this->evse;
    }
}
