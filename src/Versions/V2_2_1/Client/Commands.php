<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\CommandsTypeInterface;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\PostCommandsRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\PostCommandsResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\PostCommandsService;

class Commands extends AbstractFeatures
{
    public function post(PostCommandsRequest $request): PostCommandsResponse
    {
        return (new PostCommandsService($this->ocpiConfiguration))->handle($request);
    }
}