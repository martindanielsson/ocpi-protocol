<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\Patch;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\PartialEvseFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialEvse;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Evses\BaseEvseUpdateRequest;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\LocationRequestParams;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspEvsePatchRequest extends BaseEvseUpdateRequest
{
    private PartialEvse $partialEvse;

    /**
     * OcpiEmspEvsePatchRequest constructor.
     * @param ServerRequestInterface $request
     * @param LocationRequestParams $params
     * @throws OcpiGenericClientError
     */
    public function __construct(ServerRequestInterface $request, LocationRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Locations/Evses/evsePatchRequest.schema.json', $this->jsonBody);

        $partialEvse = PartialEvseFactory::fromJson($this->jsonBody);

        if ($partialEvse === null) {
            throw new UnexpectedValueException('PartialEvse cannot be null');
        }

        if ($partialEvse->hasUid() && $partialEvse->getUid() !== $params->getEvseUid()) {
            throw new OcpiGenericClientError('UID can not be patched');
        }

        $this->partialEvse = $partialEvse;
    }

    public function getPartialEvse(): PartialEvse
    {
        return $this->partialEvse;
    }
}
