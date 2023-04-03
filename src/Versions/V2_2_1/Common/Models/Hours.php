<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class Hours implements JsonSerializable
{
    private bool $twentyfourseven;
    /** @var RegularHours[] */
    private array $regularHours = [];
    /** @var ExceptionalPeriod[] */
    private array $exceptionalOpenings = [];
    /** @var ExceptionalPeriod[] */
    private array $exceptionalClosings = [];

    public function __construct(
        bool $twentyfourseven
    ) {
        $this->twentyfourseven = $twentyfourseven;
    }

    public function addRegularHours(RegularHours $regularHours): void
    {
        $this->regularHours[] = $regularHours;
    }

    public function addExceptionalOpening(ExceptionalPeriod $exceptionalOpening): void
    {
        $this->exceptionalOpenings[] = $exceptionalOpening;
    }

    public function addExceptionalClosing(ExceptionalPeriod $exceptionalClosing): void
    {
        $this->exceptionalClosings[] = $exceptionalClosing;
    }

    public function getTwentyfourseven(): bool
    {
        return $this->twentyfourseven;
    }

    public function getRegularHours(): array
    {
        return $this->regularHours;
    }

    public function getExceptionalOpenings(): array
    {
        return $this->exceptionalOpenings;
    }

    public function getExceptionalClosings(): array
    {
        return $this->exceptionalClosings;
    }

    public function jsonSerialize(): array
    {
        return [
            'twentyfourseven' => $this->twentyfourseven,
            'regular_hours' => $this->regularHours,
            'exceptional_openings' => $this->exceptionalOpenings,
            'exceptional_closings' => $this->exceptionalClosings
        ];
    }
}
