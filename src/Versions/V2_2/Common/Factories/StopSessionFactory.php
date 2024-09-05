<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\StopSession;
use stdClass;

class StopSessionFactory
{
    public static function fromJson(?stdClass $json): ?StopSession
    {
        if ($json === null) {
            return null;
        }

        return new StopSession(
            $json->response_url,
            $json->session_id
        );
    }
}
