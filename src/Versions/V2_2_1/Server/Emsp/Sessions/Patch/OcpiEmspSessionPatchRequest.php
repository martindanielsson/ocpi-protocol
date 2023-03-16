<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions\Patch;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\PartialSessionFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PartialSession;
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
            throw new OcpiGenericClientError('Country code can not be patched');
        }

        if ($partialSession->hasPartyId() && $partialSession->getPartyId() !== $partyId) {
            throw new OcpiGenericClientError('Party ID can not be patched');
        }

        if ($partialSession->hasId() && $partialSession->getId() !== $sessionId) {
            throw new OcpiGenericClientError('ID can not be patched');
        }

        $this->partialSession = $partialSession;
    }

    public function getPartialSession(): PartialSession
    {
        return $this->partialSession;
    }
}
