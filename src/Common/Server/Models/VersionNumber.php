<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Server\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self VERSION_2_0()
 * @method static self VERSION_2_1_1()
 * @method static self VERSION_2_2()
 * @method static self VERSION_2_2_1()
 */
class VersionNumber extends Enum
{
    public const VERSION_2_0 = '2.0';
    public const VERSION_2_1_1 = '2.1.1';
    public const VERSION_2_2 = '2.2';
    public const VERSION_2_2_1 = '2.2.1';
}
