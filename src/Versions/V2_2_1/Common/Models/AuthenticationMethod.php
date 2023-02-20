<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self AUTH_REQUEST()
 * @method static self WHITELIST()
 * @method static self COMMAND()
 */
class AuthenticationMethod extends Enum
{
    public const AUTH_REQUEST = 'AUTH_REQUEST';
    public const WHITELIST = 'WHITELIST';
    public const COMMAND = 'COMMAND';
}
