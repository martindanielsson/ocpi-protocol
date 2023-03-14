<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Commands\Post;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;

class PostCommandService extends AbstractFeatures
{
    /**
     * @throws \Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function handle(PostCommandRequest $request): PostCommandResponse
    {
        $responseInterface = $this->sendRequest($request);
        return new PostCommandResponse($responseInterface);
    }
}