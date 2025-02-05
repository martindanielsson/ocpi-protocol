<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Server\StatusCodes;

/**
 * @method static self ERROR_SERVER()
 * @method static self ERROR_SERVER_UNABLE_TO_USE()
 * @method static self ERROR_SERVER_UNSUPPORTED_VERSION()
 * @method static self ERROR_SERVER_NO_MATCHING_ENDPOINTS()
 * @method static self ERROR_HUB()
 * @method static self ERROR_HUB_UNKNOWN_RECEIVER()
 * @method static self ERROR_HUB_TIMEOUT_ON_FORWARD_REQUEST()
 * @method static self ERROR_HUB_CONNECTION_PROBLEM()
 */
class OcpiServerErrorStatusCode extends OcpiErrorStatusCode
{
    public const ERROR_SERVER = 3000;
    public const ERROR_SERVER_UNABLE_TO_USE = 3001;
    public const ERROR_SERVER_UNSUPPORTED_VERSION = 3002;
    public const ERROR_SERVER_NO_MATCHING_ENDPOINTS = 3003;
    public const ERROR_HUB = 4000;
    public const ERROR_HUB_UNKNOWN_RECEIVER = 4001;
    public const ERROR_HUB_TIMEOUT_ON_FORWARD_REQUEST = 4002;
    public const ERROR_HUB_CONNECTION_PROBLEM = 4003;
}