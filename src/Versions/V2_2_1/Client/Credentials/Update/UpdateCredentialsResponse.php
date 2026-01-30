<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Credentials\Update;

use Chargemap\OCPI\Common\Client\Modules\AbstractResponse;
use Chargemap\OCPI\Common\Client\Modules\Credentials\Update\ClientNotRegisteredException;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\CredentialsFactory;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\Credentials;
use Psr\Http\Message\ResponseInterface;

class UpdateCredentialsResponse extends AbstractResponse
{
    private Credentials $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @throws ClientNotRegisteredException
     * @throws OcpiInvalidPayloadClientError
     */
    public static function fromResponseInterface(ResponseInterface $response): self
    {
        if ($response->getStatusCode() === 405) {
            throw new ClientNotRegisteredException();
        }

        $json = self::toJson($response, 'V2_2_1/eMSP/Client/Credentials/credentialsPutResponse.schema.json');

        return new self(CredentialsFactory::fromJson($json->data));
    }

    public function getCredentials(): Credentials
    {
        return $this->credentials;
    }
}