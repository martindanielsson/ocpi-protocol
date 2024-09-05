<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self AUTH_REQUEST()
 * @method static self COMMAND()
 * @method static self WHITELIST()
 */
class AuthMethod extends Enum
{
    public const AUTH_REQUEST = 'AUTH_REQUEST';
    public const COMMAND = 'COMMAND';
    public const WHITELIST = 'WHITELIST';
}
