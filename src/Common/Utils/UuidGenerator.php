<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Utils;

use Exception;

class UuidGenerator
{
    /**
     * @throws Exception
     */
    public static function generate(): string
    {
        return vsprintf("%s%s-%s-%s-%s-%s%s%s", str_split(bin2hex(random_bytes(16)), 4));
    }
}