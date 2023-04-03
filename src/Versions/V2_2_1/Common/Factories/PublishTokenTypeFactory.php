<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Factories;

use Chargemap\OCPI\Versions\V2_2_1\Common\Models\PublishTokenType;
use Chargemap\OCPI\Versions\V2_2_1\Common\Models\TokenType;
use stdClass;

class PublishTokenTypeFactory
{
    public static function fromJson(?stdClass $json): ?PublishTokenType
    {
        if ($json === null) {
            return null;
        }

        return new PublishTokenType(
            $json->uid ?? null,
            !empty($json->type) ? new TokenType($json->type) : null,
            $json->visual_number ?? null,
            $json->issuer ?? null,
            $json->group_id ?? null
        );
    }
}
