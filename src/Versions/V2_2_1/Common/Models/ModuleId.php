<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Models\BaseModuleId;

/**
 * @method static self CDRS()
 * @method static self COMMANDS()
 * @method static self CRED_AND_REG()
 * @method static self LOCATIONS()
 * @method static self SESSIONS()
 * @method static self TARIFFS()
 * @method static self TOKENS()
 * @method static self ChargingProfiles()
 * @method static self HubClientInfo()
 */
class ModuleId extends BaseModuleId
{
    public const CDRS = 'cdrs';
    public const COMMANDS = 'commands';
    public const CRED_AND_REG = 'credentials';
    public const LOCATIONS = 'locations';
    public const SESSIONS = 'sessions';
    public const TARIFFS = 'tariffs';
    public const TOKENS = 'tokens';
    public const ChargingProfiles = 'chargingprofiles';
    public const HubClientInfo = 'hubclientinfo';
}