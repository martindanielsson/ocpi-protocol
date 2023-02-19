<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\SignedData;
use stdClass;

class SignedDataFactory
{
    public static function fromJson(?stdClass $json): SignedData
    {
        return new SignedData(
            $json->encoding_method,
            $json->encoding_method_version,
            $json->public_key,
            $json->signed_values,
            $json->url
        );
    }
}