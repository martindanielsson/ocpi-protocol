<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandsRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandsResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandsService;

class Commands extends AbstractFeatures
{
    public function post(PostCommandsRequest $request): PostCommandsResponse
    {
        return (new PostCommandsService($this->ocpiConfiguration))->handle($request);
    }
}