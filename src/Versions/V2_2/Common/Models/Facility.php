<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self HOTEL()
 * @method static self RESTAURANT()
 * @method static self CAFE()
 * @method static self MALL()
 * @method static self SUPERMARKET()
 * @method static self SPORT()
 * @method static self RECREATION_AREA()
 * @method static self NATURE()
 * @method static self MUSEUM()
 * @method static self BIKE_SHARING()
 * @method static self BUS_STOP()
 * @method static self TAXI_STAND()
 * @method static self TRAM_STOP()
 * @method static self METRO_STATION()
 * @method static self TRAIN_STATION()
 * @method static self AIRPORT()
 * @method static self PARKING_LOT()
 * @method static self CARPOOL_PARKING()
 * @method static self FUEL_STATION()
 * @method static self WIFI()
 */
class Facility extends Enum
{
    public const HOTEL = 'HOTEL';
    public const RESTAURANT = 'RESTAURANT';
    public const CAFE = 'CAFE';
    public const MALL = 'MALL';
    public const SUPERMARKET = 'SUPERMARKET';
    public const SPORT = 'SPORT';
    public const RECREATION_AREA = 'RECREATION_AREA';
    public const NATURE = 'NATURE';
    public const MUSEUM = 'MUSEUM';
    public const BIKE_SHARING = 'BIKE_SHARING';
    public const BUS_STOP = 'BUS_STOP';
    public const TAXI_STAND = 'TAXI_STAND';
    public const TRAM_STOP = 'TRAM_STOP';
    public const METRO_STATION = 'METRO_STATION';
    public const TRAIN_STATION = 'TRAIN_STATION';
    public const AIRPORT = 'AIRPORT';
    public const PARKING_LOT = 'PARKING_LOT';
    public const CARPOOL_PARKING = 'CARPOOL_PARKING';
    public const FUEL_STATION = 'FUEL_STATION';
    public const WIFI = 'WIFI';
}
