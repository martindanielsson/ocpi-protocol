<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Models;

use JsonSerializable;

class Image implements JsonSerializable
{
    private string $url;
    private ?string $thumbnail;
    private ImageCategory $category;
    private string $type;
    private ?int $width;
    private ?int $height;

    public function __construct(
        string $url,
        ?string $thumbnail,
        ImageCategory $category,
        string $type,
        ?int $width,
        ?int $height
    ) {
        $this->url = $url;
        $this->thumbnail = $thumbnail;
        $this->category = $category;
        $this->type = $type;
        $this->width = $width;
        $this->height = $height;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function getCategory(): ImageCategory
    {
        return $this->category;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function jsonSerialize(): array
    {
        return [
            'url' => $this->url,
            'thumbnail' => $this->thumbnail,
            'category' => $this->category,
            'type' => $this->type,
            'width' => $this->width,
            'height' => $this->height
        ];
    }
}
