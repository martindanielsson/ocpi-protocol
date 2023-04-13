<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class ChargingPeriod implements JsonSerializable
{
    private DateTime $startDateTime;
    /** @var CdrDimension[] */
    private array $dimensions = [];
    private ?string $tariffId;

    public function __construct(
        DateTime $startDateTime,
        ?string $tariffId
    ) {
        $this->startDateTime = $startDateTime;
        $this->tariffId = $tariffId;
    }

    public function addDimension(CdrDimension $dimension): void
    {
        $previousIndex = $this->searchDimension($dimension->getType());

        if ($previousIndex !== null) {
            $this->dimensions[$previousIndex] = $dimension;
        } else {
            $this->dimensions[] = $dimension;
        }
    }

    private function searchDimension(CdrDimensionType $dimensionType): ?int
    {
        foreach ($this->dimensions as $index => $dimension) {
            if ($dimension->getType()->equals($dimensionType)) {
                return $index;
            }
        }

        return null;
    }

    public function getStartDateTime(): DateTime
    {
        return $this->startDateTime;
    }

    public function getDimensions(): array
    {
        return $this->dimensions;
    }

    public function getDimension(CdrDimensionType $dimensionType): ?CdrDimension
    {
        $index = $this->searchDimension($dimensionType);

        if ($index === null) {
            return null;
        }

        return $this->dimensions[$index];
    }

    public function getTariffId(): ?string
    {
        return $this->tariffId;
    }

    public function jsonSerialize(): array
    {
        return [
            'start_date_time' => DateTimeFormatter::format($this->startDateTime),
            'dimensions' => $this->dimensions,
            'tariff_id' => $this->tariffId
        ];
    }
}
