<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions\Patch;

use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\PartialSessionFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialSession;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Locations\Patch\UnsupportedPatchException;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions\OcpiSessionUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspSessionPatchRequest extends OcpiSessionUpdateRequest
{
    private PartialSession $partialSession;

    public function __construct(ServerRequestInterface $request, string $countryCode, string $partyId, string $sessionId)
    {
        parent::__construct($request, $countryCode, $partyId, $sessionId);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Sessions/sessionPatchRequest.schema.json', $this->jsonBody);

        $partialSession = PartialSessionFactory::fromJson($this->jsonBody);

        if ($partialSession === null) {
            throw new UnexpectedValueException('PartialSession cannot be null');
        }

        if ($partialSession->hasCountryCode() && $partialSession->getCountryCode() !== $countryCode) {
            throw new UnsupportedPatchException('Country code can not be patched at the moment');
        }

        if ($partialSession->hasPartyId() && $partialSession->getPartyId() !== $partyId) {
            throw new UnsupportedPatchException('Party ID can not be patched at the moment');
        }

        if ($partialSession->hasId() && $partialSession->getId() !== $sessionId) {
            throw new UnsupportedPatchException('ID can not be patched at the moment');
        }

        $this->partialSession = $partialSession;
    }

    public function getPartialSession(): PartialSession
    {
        return $this->partialSession;
    }
}
