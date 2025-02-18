<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Client;

use Chargemap\OCPI\Common\Client\Modules\AbstractFeatures;
use Chargemap\OCPI\Common\Client\Modules\AbstractRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Cdrs\GetListing\GetCdrsListingRequest as V2_1_1_GetCdrsListingRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Cdrs\GetListing\GetCdrsListingService as V2_1_1_GetCdrsListingService;
use Chargemap\OCPI\Versions\V2_1_1\Client\Locations\Get\GetLocationRequest as V2_1_1_GetLocationRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Locations\Get\GetLocationService as V2_1_1_GetLocationService;
use Chargemap\OCPI\Versions\V2_1_1\Client\Locations\GetListing\GetLocationsListingRequest as V2_1_1_GetLocationsListingRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Locations\GetListing\GetLocationsListingService as V2_1_1_GetLocationsListingService;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Get\GetTokenRequest as V2_1_1_GetTokenRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Get\GetTokenService as V2_1_1_GetTokenService;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Patch\PatchTokenRequest as V2_1_1_PatchTokenRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Patch\PatchTokenService as V2_1_1_PatchTokenService;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Put\PutTokenRequest as V2_1_1_PutTokenRequest;
use Chargemap\OCPI\Versions\V2_1_1\Client\Tokens\Put\PutTokenService as V2_1_1_PutTokenService;
use Chargemap\OCPI\Versions\V2_2\Client\Cdrs\GetListing\GetCdrsListingRequest as V2_2_GetCdrsListingRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Cdrs\GetListing\GetCdrsListingService as V2_2_GetCdrsListingService;
use Chargemap\OCPI\Versions\V2_2\Client\Locations\Get\GetLocationRequest as V2_2_GetLocationRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Locations\Get\GetLocationService as V2_2_GetLocationService;
use Chargemap\OCPI\Versions\V2_2\Client\Locations\GetListing\GetLocationsListingRequest as V2_2_GetLocationsListingRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Locations\GetListing\GetLocationsListingService as V2_2_GetLocationsListingService;
use Chargemap\OCPI\Versions\V2_2\Client\Sessions\GetListing\GetSessionsListingRequest as V2_2_GetSessionsListingRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Sessions\GetListing\GetSessionsListingService as V2_2_GetSessionsListingService;
use Chargemap\OCPI\Versions\V2_2\Client\Tariffs\GetListing\GetTariffsListingRequest as V2_2_GetTariffsListingRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Tariffs\GetListing\GetTariffsListingService as V2_2_GetTariffsListingService;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Get\GetTokenRequest as V2_2_GetTokenRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Get\GetTokenService as V2_2_GetTokenService;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Patch\PatchTokenRequest as V2_2_PatchTokenRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Patch\PatchTokenService as V2_2_PatchTokenService;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Put\PutTokenRequest as V2_2_PutTokenRequest;
use Chargemap\OCPI\Versions\V2_2\Client\Tokens\Put\PutTokenService as V2_2_PutTokenService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Cdrs\GetListing\GetCdrsListingRequest as V2_2_1_GetCdrsListingRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Cdrs\GetListing\GetCdrsListingService as V2_2_1_GetCdrsListingService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Locations\Get\GetLocationRequest as V2_2_1_GetLocationRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Locations\Get\GetLocationService as V2_2_1_GetLocationService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Locations\GetListing\GetLocationsListingRequest as V2_2_1_GetLocationsListingRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Locations\GetListing\GetLocationsListingService as V2_2_1_GetLocationsListingService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\GetListing\GetSessionsListingRequest as V2_2_1_GetSessionsListingRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Sessions\GetListing\GetSessionsListingService as V2_2_1_GetSessionsListingService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tariffs\GetListing\GetTariffsListingRequest as V2_2_1_GetTariffsListingRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tariffs\GetListing\GetTariffsListingService as V2_2_1_GetTariffsListingService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Get\GetTokenRequest as V2_2_1_GetTokenRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Get\GetTokenService as V2_2_1_GetTokenService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Patch\PatchTokenRequest as V2_2_1_PatchTokenRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Patch\PatchTokenService as V2_2_1_PatchTokenService;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Put\PutTokenRequest as V2_2_1_PutTokenRequest;
use Chargemap\OCPI\Versions\V2_2_1\Client\Tokens\Put\PutTokenService as V2_2_1_PutTokenService;
use UnexpectedValueException;

final class ServiceFactory
{
    public static function from(AbstractRequest $request, OcpiConfiguration $configuration): AbstractFeatures
    {
        switch ($request->getVersion()->getValue()) {
            case OcpiVersion::V2_1_1:
                if (get_class($request) === V2_1_1_GetCdrsListingRequest::class) {
                    return new V2_1_1_GetCdrsListingService($configuration);
                }
                if (get_class($request) === V2_1_1_GetLocationRequest::class) {
                    return new V2_1_1_GetLocationService($configuration);
                }
                if (get_class($request) === V2_1_1_GetLocationsListingRequest::class) {
                    return new V2_1_1_GetLocationsListingService($configuration);
                }
                if (get_class($request) === V2_1_1_GetTokenRequest::class) {
                    return new V2_1_1_GetTokenService($configuration);
                }
                if (get_class($request) === V2_1_1_PatchTokenRequest::class) {
                    return new V2_1_1_PatchTokenService($configuration);
                }
                if (get_class($request) === V2_1_1_PutTokenRequest::class) {
                    return new V2_1_1_PutTokenService($configuration);
                }
                break;
            case OcpiVersion::V2_2:
                if (get_class($request) === V2_2_GetCdrsListingRequest::class) {
                    return new V2_2_GetCdrsListingService($configuration);
                }
                if (get_class($request) === V2_2_GetLocationRequest::class) {
                    return new V2_2_GetLocationService($configuration);
                }
                if (get_class($request) === V2_2_GetLocationsListingRequest::class) {
                    return new V2_2_GetLocationsListingService($configuration);
                }
                if (get_class($request) === V2_2_GetSessionsListingRequest::class) {
                    return new V2_2_GetSessionsListingService($configuration);
                }
                if (get_class($request) === V2_2_GetTariffsListingRequest::class) {
                    return new V2_2_GetTariffsListingService($configuration);
                }
                if (get_class($request) === V2_2_GetTokenRequest::class) {
                    return new V2_2_GetTokenService($configuration);
                }
                if (get_class($request) === V2_2_PatchTokenRequest::class) {
                    return new V2_2_PatchTokenService($configuration);
                }
                if (get_class($request) === V2_2_PutTokenRequest::class) {
                    return new V2_2_PutTokenService($configuration);
                }
                break;
            case OcpiVersion::V2_2_1:
                if (get_class($request) === V2_2_1_GetCdrsListingRequest::class) {
                    return new V2_2_1_GetCdrsListingService($configuration);
                }
                if (get_class($request) === V2_2_1_GetLocationRequest::class) {
                    return new V2_2_1_GetLocationService($configuration);
                }
                if (get_class($request) === V2_2_1_GetLocationsListingRequest::class) {
                    return new V2_2_1_GetLocationsListingService($configuration);
                }
                if (get_class($request) === V2_2_1_GetSessionsListingRequest::class) {
                    return new V2_2_1_GetSessionsListingService($configuration);
                }
                if (get_class($request) === V2_2_1_GetTariffsListingRequest::class) {
                    return new V2_2_1_GetTariffsListingService($configuration);
                }
                if (get_class($request) === V2_2_1_GetTokenRequest::class) {
                    return new V2_2_1_GetTokenService($configuration);
                }
                if (get_class($request) === V2_2_1_PatchTokenRequest::class) {
                    return new V2_2_1_PatchTokenService($configuration);
                }
                if (get_class($request) === V2_2_1_PutTokenRequest::class) {
                    return new V2_2_1_PutTokenService($configuration);
                }
                break;
        }

        throw new UnexpectedValueException(sprintf('Could not find service to handle %s class request', get_class($request)));
    }
}
