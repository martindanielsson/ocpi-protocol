<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use MyCLabs\Enum\Enum;

class Role extends Enum
{
    public const CPO = 'CPO';
    public const EMSP = 'EMSP';
    public const HUB = 'HUB';
    public const NAP = 'NAP';
    public const NSP = 'NSP';
    public const OTHER = 'OTHER';
    public const SCSP = 'SCSP';
}