<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\SignedValueFactory;
use stdClass;

class SignedData implements \JsonSerializable
{
    private string $encodingMethod;

    private ?int $encodingMethodVersion;

    private ?string $publicKey;

    /**
     * @var SignedValue[]
     */
    private array $signedValues;

    private ?string $url;

    /**
     * @param string $encodingMethod
     * @param int|null $encodingMethodVersion
     * @param string|null $publicKey
     * @param stdClass|null $signedValues
     * @param string|null $url
     */
    public function __construct(
        string $encodingMethod,
        ?int $encodingMethodVersion,
        ?string $publicKey,
        ?stdClass $signedValues,
        ?string $url
    ) {
        $this->encodingMethod = $encodingMethod;
        $this->encodingMethodVersion = $encodingMethodVersion;
        $this->publicKey = $publicKey;
        $this->signedValues = SignedValueFactory::fromJson($signedValues);
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getEncodingMethod(): string
    {
        return $this->encodingMethod;
    }

    /**
     * @return int|null
     */
    public function getEncodingMethodVersion(): ?int
    {
        return $this->encodingMethodVersion;
    }

    /**
     * @return string|null
     */
    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    /**
     * @return SignedValue[]
     */
    public function getSignedValues(): array
    {
        return $this->signedValues;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'encoding_method' => $this->encodingMethod,
            'signed_values' => $this->signedValues,
        ];

        if ($this->encodingMethodVersion !== null) {
            $return['encoding_method_version'] = $this->encodingMethodVersion;
        }

        if ($this->publicKey !== null) {
            $return['public_key'] = $this->publicKey;
        }

        if ($this->url !== null) {
            $return['url'] = $this->url;
        }

        return $return;
    }
}