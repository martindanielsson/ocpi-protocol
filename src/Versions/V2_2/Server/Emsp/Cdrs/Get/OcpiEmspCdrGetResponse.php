<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2\Server\Emsp\Cdrs\Get;

use Chargemap\OCPI\Common\Server\OcpiSuccessResponse;
use Chargemap\OCPI\Common\Server\StatusCodes\OcpiSuccessHttpCode;
use Chargemap\OCPI\Versions\V2_2\Common\Models\Cdr;

class OcpiEmspCdrGetResponse extends OcpiSuccessResponse
{
    private Cdr $cdr;

    public function __construct(Cdr $cdr, string $statusMessage = null)
    {
        parent::__construct(OcpiSuccessHttpCode::HTTP_OK(), $statusMessage);
        $this->cdr = $cdr;
    }

    protected function getData(): Cdr
    {
        return $this->cdr;
    }
}
