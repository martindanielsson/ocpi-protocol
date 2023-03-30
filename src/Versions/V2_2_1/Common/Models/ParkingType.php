<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self ALONG_MOTORWAY()
 * @method static self PARKING_GARAGE()
 * @method static self PARKING_LOT()
 * @method static self ON_DRIVEWAY()
 * @method static self ON_STREET()
 * @method static self UNDERGROUND_GARAGE()
 */
class ParkingType extends Enum
{
    public const ALONG_MOTORWAY = 'ALONG_MOTORWAY';
    public const PARKING_GARAGE = 'PARKING_GARAGE';
    public const PARKING_LOT = 'PARKING_LOT';
    public const ON_DRIVEWAY = 'ON_DRIVEWAY';
    public const ON_STREET = 'ON_STREET';
    public const UNDERGROUND_GARAGE = 'UNDERGROUND_GARAGE';
}
