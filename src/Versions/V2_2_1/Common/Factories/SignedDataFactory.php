<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\SignedData;
use stdClass;

class SignedDataFactory
{
    public static function fromJson(?stdClass $json): ?SignedData
    {
        if ($json === null) {
            return null;
        }

        $signedData = new SignedData(
            $json->encoding_method,
            $json->encoding_method_version ?? null,
            $json->public_key ?? null,
            $json->url ?? null
        );

        foreach ($json->signed_values ?? [] as $signedValue) {
            $signedData->addSignedValue(SignedValueFactory::fromJson($signedValue));
        }

        return $signedData;
    }
}