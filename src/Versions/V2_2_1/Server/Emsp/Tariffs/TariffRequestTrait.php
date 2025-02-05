<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Server\Emsp\Tariffs;

trait TariffRequestTrait
{
    protected string $countryCode;

    protected string $partyId;

    protected string $tariffId;

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

    protected function dispatchParams(TariffRequestParams $params): void
    {
        $this->countryCode = $params->getCountryCode();
        $this->partyId = $params->getPartyId();
        $this->tariffId = $params->getTariffId();
    }
}