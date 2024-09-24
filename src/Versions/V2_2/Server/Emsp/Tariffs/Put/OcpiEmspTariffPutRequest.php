<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Tariffs\Put;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;
use Chargemap\OCPI\Common\Utils\PayloadValidation;
use Chargemap\OCPI\Versions\V2_2\Common\Factories\TariffFactory;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Tariff;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Tariffs\TariffRequestParams;
use Chargemap\OCPI\Versions\V2_2\Server\Emsp\Tariffs\OcpiTariffUpdateRequest;
use Psr\Http\Message\ServerRequestInterface;
use UnexpectedValueException;

class OcpiEmspTariffPutRequest extends OcpiTariffUpdateRequest
{
    private Tariff $tariff;

    public function __construct(ServerRequestInterface $request, TariffRequestParams $params)
    {
        parent::__construct($request, $params);
        PayloadValidation::coerce('V2_2/eMSP/Server/Tariffs/tariffPutRequest.schema.json', $this->jsonBody);

        $tariff = TariffFactory::fromJson($this->jsonBody);

        if ($tariff === null) {
            throw new UnexpectedValueException('Tariff cannot be null');
        }

        if ($tariff->getId() !== $params->getTariffId()) {
            throw new OcpiGenericClientError('ID can not differ');
        }

        $this->tariff = $tariff;
    }

    public function getTariff(): Tariff
    {
        return $this->tariff;
    }
}
