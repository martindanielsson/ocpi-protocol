<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\SignedValue;
use stdClass;

class SignedValueFactory
{
    public static function fromJson(?stdClass $json): array
    {
        $signedValues = [];

        foreach ($json as $values) {
            $signedValues[] = self::fromJsonToSignedValue($values);
        }

        return $signedValues;
    }

    public static function fromJsonToSignedValue(?stdClass $json): SignedValue
    {
        return new SignedValue($json->nature, $json->plain_data, $json->signed_data);
    }
}