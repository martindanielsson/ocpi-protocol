<?php

namespace Chargemap\OCPI\Common\Client\Modules\Sessions\PutChargingPreferences;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\OcpiServiceNotFoundException;
use Chargemap\OCPI\Common\Client\ServiceFactory;

class PutChargingPreferencesService extends AbstractFeatures
{
    public function handle(PutChargingPreferencesRequest $request): PutChargingPreferencesResponse
    {
        $service = ServiceFactory::from($request, $this->ocpiConfiguration);

        switch (get_class($service)) {
            case \Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\PutChargingPreferences\PutChargingPreferencesService::class:
                return $service->handle($request);
        }

        throw new OcpiServiceNotFoundException($request->getVersion(), get_class($request), sprintf('No service found for query %s', get_class($service)));
    }

}