<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Versions\V2_2_1\Common\Factories\GeoLocationFactory;

class CdrLocation implements \JsonSerializable
{
    private string $id;

    private ?string $name;

    private string $address;

    private string $city;

    private ?string $postalCode;

    private ?string $state;

    private string $country;

    private GeoLocation $coordinates;

    private string $evseUid;

    private string $evseId;

    private string $connectorId;

    private ConnectorType $connectorStandard;

    private ConnectorFormat $connectorFormat;

    private PowerType $connectorPowerType;

    public function __construct(
        string $id,
        ?string $name,
        string $address,
        string $city,
        ?string $postalCode,
        ?string $state,
        string $country,
        \stdClass $coordinates,
        string $evseUid,
        string $evseId,
        string $connectorId,
        string $connectorStandard,
        string $connectorFormat,
        string $connectorPowerType
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->state = $state;
        $this->country = $country;
        $this->coordinates = GeoLocationFactory::fromJson($coordinates);
        $this->evseUid = $evseUid;
        $this->evseId = $evseId;
        $this->connectorId = $connectorId;
        $this->connectorStandard = new ConnectorType($connectorStandard);
        $this->connectorFormat = new ConnectorFormat($connectorFormat);
        $this->connectorPowerType = new PowerType($connectorPowerType);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return GeoLocation|null
     */
    public function getCoordinates(): ?GeoLocation
    {
        return $this->coordinates;
    }

    /**
     * @return string
     */
    public function getEvseUid(): string
    {
        return $this->evseUid;
    }

    /**
     * @return string
     */
    public function getEvseId(): string
    {
        return $this->evseId;
    }

    /**
     * @return string
     */
    public function getConnectorId(): string
    {
        return $this->connectorId;
    }

    /**
     * @return ConnectorType
     */
    public function getConnectorStandard(): ConnectorType
    {
        return $this->connectorStandard;
    }

    /**
     * @return ConnectorFormat
     */
    public function getConnectorFormat(): ConnectorFormat
    {
        return $this->connectorFormat;
    }

    /**
     * @return PowerType
     */
    public function getConnectorPowerType(): PowerType
    {
        return $this->connectorPowerType;
    }

    public function jsonSerialize(): array
    {
        $return = [
            'id' => $this->id,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'coordinates' => $this->coordinates,
            'evse_uid' => $this->evseUid,
            'evse_id' => $this->evseId,
            'connector_id' => $this->connectorId,
            'connector_standard' => $this->connectorStandard,
            'connector_format' => $this->connectorFormat,
            'connector_power_type' => $this->connectorPowerType
        ];

        if ($this->name !== null) {
            $return['name'] = $this->name;
        }

        if ($this->postalCode !== null) {
            $return['postal_code'] = $this->postalCode;
        }

        if ($this->state !== null) {
            $return['state'] = $this->state;
        }

        return $return;
    }
}