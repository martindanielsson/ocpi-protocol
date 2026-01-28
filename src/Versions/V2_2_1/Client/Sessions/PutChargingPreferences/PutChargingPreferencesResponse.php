<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\PutChargingPreferences;

use Chargemap\OCPI\Common\Client\Modules\Sessions\PutChargingPreferences\PutChargingPreferencesResponse as BaseResponse;
use Chargemap\OCPI\Common\Server\Errors\OcpiInvalidPayloadClientError;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\ChargingPreferencesResponse;
use Psr\Http\Message\ResponseInterface;

class PutChargingPreferencesResponse extends BaseResponse
{
    private ChargingPreferencesResponse $chargingPreferencesResponse;

    public function __construct(ChargingPreferencesResponse $chargingPreferencesResponse)
    {
        $this->chargingPreferencesResponse = $chargingPreferencesResponse;
    }

    public function getChargingPreferencesResponse(): ChargingPreferencesResponse
    {
        return $this->chargingPreferencesResponse;
    }

    /**
     * @throws OcpiInvalidPayloadClientError
     */
    public static function from(ResponseInterface $response): self
    {
        $json = self::toJson($response, 'V2_2_1/eMSP/Client/Sessions/sessionPutChargingPreferencesResponse.schema.json');

        $chargingPreferencesResponse = ChargingPreferencesResponse::from($json->data);

        return new self($chargingPreferencesResponse);
    }

}