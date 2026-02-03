<?php

declare(strict_types=1);

namespace Chargemap\OCPI\Common\Client\Modules;

use Chargemap\OCPI\Common\Client\OcpiConfiguration;
use Chargemap\OCPI\Common\Client\OcpiEndpointNotFoundException;
use Exception;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

class AbstractFeatures
{
    protected OcpiConfiguration $ocpiConfiguration;

    public function __construct(OcpiConfiguration $ocpiConfiguration)
    {
        $this->ocpiConfiguration = $ocpiConfiguration;
    }

    /**
     * @throws ClientExceptionInterface|OcpiEndpointNotFoundException
     */
    protected function sendRequest(AbstractRequest $request): ResponseInterface
    {
        $serverRequestInterface = $this->getServerRequestInterface($request);

        if ($logger = $this->ocpiConfiguration->getLogger()) {
            $logger->debug('OCPI sendRequest', [
                'method' => $serverRequestInterface->getMethod(),
                'uri' => $serverRequestInterface->getUri(),
                'headers' => $serverRequestInterface->getHeaders(),
                'body' => $serverRequestInterface->getBody(),
            ]);
        }

        return $this->ocpiConfiguration->getHttpClient()->sendRequest($serverRequestInterface);
    }

    /**
     * @throws OcpiEndpointNotFoundException
     * @throws Exception
     */
    private function getServerRequestInterface(AbstractRequest $request): ServerRequestInterface
    {
        $uriFactory = Psr17FactoryDiscovery::findUriFactory();

        $url = $this->ocpiConfiguration->getEndpoint($request->getModule(), $request->getVersion())->getUrl();

        $endpointUri = $uriFactory->createUri($url);

        $serverRequestInterface = $request->getServerRequestInterface($this->ocpiConfiguration->getServerRequestFactory(),
            $this->ocpiConfiguration->getStreamFactory());

        $serverRequestInterface = $this->addAuthorization($serverRequestInterface);
        $serverRequestInterface = $this->addRequestAndCorrelationHeaders($serverRequestInterface);

        $uri = self::forgeUri($endpointUri, $serverRequestInterface->getUri());

        return $serverRequestInterface->withUri($uri);
    }

    protected function addAuthorization(ServerRequestInterface $request): ServerRequestInterface
    {
        return $request->withHeader('Authorization', 'Token ' . $this->ocpiConfiguration->getToken());
    }

    /**
     * @throws Exception
     */
    protected function addRequestAndCorrelationHeaders(ServerRequestInterface $request): ServerRequestInterface
    {
        return $request->withHeader('X-Request-ID', $this->ocpiConfiguration->getRequestId())
            ->withHeader('X-Correlation-ID', $this->ocpiConfiguration->getCorrelationId());
    }

    private static function forgeUri(UriInterface $baseUri, UriInterface $requestUri): UriInterface
    {
        $basePath = rtrim($baseUri->getPath(), '/');
        $uri = $requestUri
            ->withPath($basePath . $requestUri->getPath())
            ->withScheme($baseUri->getScheme())
            ->withHost($baseUri->getHost());

        if (!empty($baseUri->getPort())) {
            $uri = $uri->withPort($baseUri->getPort());
        }

        if (!empty($baseUri->getUserInfo())) {
            $uri = $uri->withUserInfo($baseUri->getUserInfo());
        }

        return $uri;
    }
}
