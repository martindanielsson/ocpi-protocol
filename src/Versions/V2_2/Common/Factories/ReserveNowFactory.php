<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\ReserveNow;
use DateTime;
use stdClass;

class ReserveNowFactory
{
    public static function fromJson(?stdClass $json): ?ReserveNow
    {
        if ($json === null) {
            return null;
        }

        return new ReserveNow(
            $json->response_url,
            TokenFactory::fromJson($json->token),
            new DateTime($json->expiry_date),
            $json->reservation_id,
            $json->location_id,
            $json->evse_uid ?? null,
            $json->authorization_reference ?? null
        );
    }
}
