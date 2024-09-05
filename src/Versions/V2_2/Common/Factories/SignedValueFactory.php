<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\SignedValue;
use stdClass;

class SignedValueFactory
{
    public static function fromJson(?stdClass $json): ?SignedValue
    {
        if ($json === null) {
            return null;
        }

        return new SignedValue(
            $json->nature,
            $json->plain_data,
            $json->signed_data
        );
    }
}