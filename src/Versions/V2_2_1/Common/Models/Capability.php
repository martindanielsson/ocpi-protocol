<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use MyCLabs\Enum\Enum;

/**
 * @method static self CHARGING_PROFILE_CAPABLE()
 * @method static self CREDIT_CARD_PAYABLE()
 * @method static self REMOTE_START_STOP_CAPABLE()
 * @method static self RESERVABLE()
 * @method static self RFID_READER()
 * @method static self UNLOCK_CAPABLE()
 * @method static self CHARGING_PREFERENCES_CAPABLE()
 * @method static self DEBIT_CARD_PAYABLE()
 * @method static self TOKEN_GROUP_CAPABLE()
 * @method static self START_SESSION_CONNECTOR_REQUIRED()
 */
class Capability extends Enum
{
    public const CHARGING_PROFILE_CAPABLE = 'CHARGING_PROFILE_CAPABLE';
    public const CREDIT_CARD_PAYABLE = 'CREDIT_CARD_PAYABLE';
    public const REMOTE_START_STOP_CAPABLE = 'REMOTE_START_STOP_CAPABLE';
    public const RESERVABLE = 'RESERVABLE';
    public const RFID_READER = 'RFID_READER';
    public const UNLOCK_CAPABLE = 'UNLOCK_CAPABLE';
    public const CHARGING_PREFERENCES_CAPABLE = 'CHARGING_PREFERENCES_CAPABLE';
    public const DEBIT_CARD_PAYABLE = 'DEBIT_CARD_PAYABLE';
    public const TOKEN_GROUP_CAPABLE = 'TOKEN_GROUP_CAPABLE';
    public const START_SESSION_CONNECTOR_REQUIRED = 'START_SESSION_CONNECTOR_REQUIRED';
}
