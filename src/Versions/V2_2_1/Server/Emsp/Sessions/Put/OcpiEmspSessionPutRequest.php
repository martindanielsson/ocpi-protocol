<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions\Put;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\SessionFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Session;
use Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Sessions\OcpiSessionUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspSessionPutRequest extends OcpiSessionUpdateRequest
{
    private Session $session;

    public function __construct(ServerRequestInterface $request, string $countryCode, string $partyId, string $sessionId)
    {
        parent::__construct($request, $countryCode, $partyId, $sessionId);
        PayloadValidation::coerce('V2_2_1/eMSP/Server/Sessions/sessionPutRequest.schema.json', $this->jsonBody);

        $session = SessionFactory::fromJson($this->jsonBody);

        if ($session === null) {
            throw new UnexpectedValueException('Session cannot be null');
        }

        if ($session->getId() !== $sessionId) {
            throw new OcpiGenericClientError('ID can not differ');
        }

        $this->session = $session;
    }

    public function getSession(): Session
    {
        return $this->session;
    }
}
