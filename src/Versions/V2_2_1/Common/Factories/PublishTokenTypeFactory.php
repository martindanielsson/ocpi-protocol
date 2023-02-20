<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PublishTokenType;

class PublishTokenTypeFactory
{
    public static function fromJson(?\stdClass $json): array
    {
        $array = [];

        if ($json === null) {
            return $array;
        }

        foreach ($json as $values) {
            $array[] = self::build($values);
        }

        return $array;
    }

    public static function build(?\stdClass $json): PublishTokenType
    {
        return new PublishTokenType($json->uid, $json->type, $json->visual_number, $json->issuer, $json->group_id);
    }
}