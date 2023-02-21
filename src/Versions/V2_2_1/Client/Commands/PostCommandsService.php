<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Client\Commands;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\OcpiServiceNotFoundException;
use Chargemap\OCPI\Common\Client\ServiceFactory;

class PostCommandsService extends AbstractFeatures
{
    public function handle(\Chargemap\OCPI\Common\Client\Modules\Commands\PostCommandsRequest $request): PostCommandsResponse
    {
        $service = ServiceFactory::from($request, $this->ocpiConfiguration);

        switch (get_class($service)) {
            case PostCommandsService::class:
                return $service->handle($request);
        }

        throw new OcpiServiceNotFoundException($request->getVersion(), get_class($request), sprintf('No service found for query %s', get_class($service)));
    }
}