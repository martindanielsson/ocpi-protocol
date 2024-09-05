<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\DisplayText;
use stdClass;

class DisplayTextFactory
{
    public static function fromJson(?stdClass $json): ?DisplayText
    {
        if ($json === null) {
            return null;
        }

        return new DisplayText(
            $json->language,
            $json->text
        );
    }
}
