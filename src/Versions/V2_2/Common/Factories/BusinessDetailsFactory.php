<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\BusinessDetails;
use stdClass;

class BusinessDetailsFactory
{
    public static function fromJson(?stdClass $json): ?BusinessDetails
    {
        if ($json === null) {
            return null;
        }

        return new BusinessDetails(
            $json->name,
            $json->website ?? null,
            ImageFactory::fromJson($json->logo ?? null)
        );
    }
}
