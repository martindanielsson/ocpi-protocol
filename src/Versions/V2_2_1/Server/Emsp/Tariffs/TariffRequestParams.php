<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs;

use Chargemap\OCPI\Common\Server\Errors\OcpiGenericClientError;

class TariffRequestParams
{
    private string $countryCode;

    private string $partyId;

    private string $tariffId;

    public function __construct(string $countryCode, string $partyId, string $tariffId)
    {
        if (empty($countryCode) || mb_strlen($countryCode) !== 2) {
            throw new OcpiGenericClientError('Country code should contain exactly 2 letters.');
        }

        if (empty ($partyId) || mb_strlen($partyId) !== 3) {
            throw new OcpiGenericClientError('Party ID should contain exactly 3 characters.');
        }

        if (empty($tariffId) || mb_strlen($tariffId) > 36) {
            throw new OcpiGenericClientError('Tariff ID should contain less than 36 characters.');
        }

        $this->countryCode = $countryCode;
        $this->partyId = $partyId;
        $this->tariffId = $tariffId;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPartyId(): string
    {
        return $this->partyId;
    }

    public function getTariffId(): string
    {
        return $this->tariffId;
    }
}
