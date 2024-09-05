<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self AD_HOC_USER()
 * @method static self APP_USER()
 * @method static self OTHER()
 * @method static self RFID()
 */
class TokenType extends Enum
{
    public const AD_HOC_USER = 'AD_HOC_USER';
    public const APP_USER = 'APP_USER';
    public const OTHER = 'OTHER';
    public const RFID = 'RFID';
}
