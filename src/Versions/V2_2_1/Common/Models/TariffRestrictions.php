<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use JsonSerializable;

class TariffRestrictions implements JsonSerializable
{
    private ?string $startTime;
    private ?string $endTime;
    private ?string $startDate;
    private ?string $endDate;
    private ?float $minKwh;
    private ?float $maxKwh;
    private ?float $minCurrent;
    private ?float $maxCurrent;
    private ?float $minPower;
    private ?float $maxPower;
    private ?int $minDuration;
    private ?int $maxDuration;
    /** @var DayOfWeek[] */
    private array $dayOfWeek = [];
    private ?ReservationRestrictionType $reservation;

    public function __construct(
        ?string $startTime,
        ?string $endTime,
        ?string $startDate,
        ?string $endDate,
        ?float $minKwh,
        ?float $maxKwh,
        ?float $minCurrent,
        ?float $maxCurrent,
        ?float $minPower,
        ?float $maxPower,
        ?int $minDuration,
        ?int $maxDuration,
        ?ReservationRestrictionType $reservation
    ) {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->minKwh = $minKwh;
        $this->maxKwh = $maxKwh;
        $this->minCurrent = $minCurrent;
        $this->maxCurrent = $maxCurrent;
        $this->minPower = $minPower;
        $this->maxPower = $maxPower;
        $this->minDuration = $minDuration;
        $this->maxDuration = $maxDuration;
        $this->reservation = $reservation;
    }

    public function addDayOfWeek(DayOfWeek $dayOfWeek): self
    {
        $this->dayOfWeek[] = $dayOfWeek;
        return $this;
    }

    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function getMinKwh(): ?float
    {
        return $this->minKwh;
    }

    public function getMaxKwh(): ?float
    {
        return $this->maxKwh;
    }

    public function getMinCurrent(): ?float
    {
        return $this->minCurrent;
    }

    public function getMaxCurrent(): ?float
    {
        return $this->maxCurrent;
    }

    public function getMinPower(): ?float
    {
        return $this->minPower;
    }

    public function getMaxPower(): ?float
    {
        return $this->maxPower;
    }

    public function getMinDuration(): ?int
    {
        return $this->minDuration;
    }

    public function getMaxDuration(): ?int
    {
        return $this->maxDuration;
    }

    public function getReservation(): ?ReservationRestrictionType
    {
        return $this->reservation;
    }

    public function jsonSerialize(): array
    {
        return [
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'min_kwh' => $this->min_kwh,
            'max_kwh' => $this->max_kwh,
            'min_current' => $this->min_current,
            'max_current' => $this->max_current,
            'min_power' => $this->min_power,
            'max_power' => $this->max_power,
            'min_duration' => $this->min_duration,
            'max_duration' => $this->max_duration,
            'day_of_week' => $this->day_of_week,
            'reservation' => $this->reservation
        ];
    }
}
