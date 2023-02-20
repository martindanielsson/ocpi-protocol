<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self ENERGY()
 * @method static self MAX_CURRENT()
 * @method static self MIN_CURRENT()
 * @method static self PARKING_TIME()
 * @method static self TIME()
 * @method static self RESERVATION_TIME()
 */
class CdrDimensionType extends Enum
{
    public const ENERGY = 'ENERGY';
    public const MAX_CURRENT = 'MAX_CURRENT';
    public const MIN_CURRENT = 'MIN_CURRENT';
    public const PARKING_TIME = 'PARKING_TIME';
    public const TIME = 'TIME';
    public const RESERVATION_TIME = 'RESERVATION_TIME';
}
