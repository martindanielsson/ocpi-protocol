<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

use Chargemap\OCPI\Common\Utils\DateTimeFormatter;
use DateTime;
use JsonSerializable;

class ChargingPreferences implements JsonSerializable
{
    private ProfileType $profileType;
    private ?DateTime $departureTime;
    private ?float $energyNeed;
    private ?bool $dischargeAllowed;

    public function __construct(ProfileType $profileType, ?DateTime $departureTime = null, ?float $energyNeed = null, ?bool $dischargeAllowed = null)
    {
        $this->profileType = $profileType;
        $this->departureTime = $departureTime;
        $this->energyNeed = $energyNeed;
        $this->dischargeAllowed = $dischargeAllowed;
    }

    public function getProfileType(): ProfileType
    {
        return $this->profileType;
    }

    public function getDepartureTime(): ?DateTime
    {
        return $this->departureTime;
    }

    public function getEnergyNeed(): ?float
    {
        return $this->energyNeed;
    }

    public function isDischargeAllowed(): ?bool
    {
        return $this->dischargeAllowed;
    }

    public function jsonSerialize(): array
    {
        return [
            'profile_type' => $this->profileType,
            'departure_time' => DateTimeFormatter::format($this->departureTime),
            'energy_need' => $this->energyNeed,
            'discharge_allowed' => $this->dischargeAllowed,
        ];
    }
}