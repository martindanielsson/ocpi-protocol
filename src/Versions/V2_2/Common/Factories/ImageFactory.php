<?php

namespace Chargemap\OCPI\Versions\V2_2\Common\Factories;

use Chargemap\OCPI\Versions\V2_2\Common\Models\Image;
use Chargemap\OCPI\Versions\V2_2\Common\Models\ImageCategory;
use stdClass;

class ImageFactory
{
    public static function fromJson(?stdClass $json): ?Image
    {
        if ($json === null) {
            return null;
        }

        return new Image(
            $json->url,
            $json->thumbnail ?? null,
            new ImageCategory($json->category),
            $json->type,
            $json->width ?? null,
            $json->height ?? null
        );
    }
}
