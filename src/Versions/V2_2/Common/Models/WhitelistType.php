<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self ALWAYS()
 * @method static self ALLOWED()
 * @method static self ALLOWED_OFFLINE()
 * @method static self NEVER()
 */
class WhitelistType extends Enum
{
    public const ALWAYS = 'ALWAYS';
    public const ALLOWED = 'ALLOWED';
    public const ALLOWED_OFFLINE = 'ALLOWED_OFFLINE';
    public const NEVER = 'NEVER';
}
