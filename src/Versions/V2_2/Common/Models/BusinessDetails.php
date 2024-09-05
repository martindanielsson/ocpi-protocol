<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class BusinessDetails implements JsonSerializable
{
    private string $name;
    private ?string $website;
    private ?Image $logo;

    public function __construct(
        string $name,
        ?string $website,
        ?Image $logo
    ) {
        $this->name = $name;
        $this->website = $website;
        $this->logo = $logo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function getLogo(): ?Image
    {
        return $this->logo;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'website' => $this->website,
            'logo' => $this->logo
        ];
    }
}
