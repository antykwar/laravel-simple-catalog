<?php

namespace App\Interfaces;

use App\Models\Images\ImageSize;

interface EntityWithImagesInterface
{
    public function getPathToImages(): string;

    public function getImageFilename(): string;

    public function getSmallThumbSize(): ?ImageSize;
}
