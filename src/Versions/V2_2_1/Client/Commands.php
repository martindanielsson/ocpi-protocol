<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandResponse;
use Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post\PostCommandService;

class Commands extends AbstractFeatures
{
    public function post(PostCommandRequest $request): PostCommandResponse
    {
        return (new PostCommandService($this->ocpiConfiguration))->handle($request);
    }
}