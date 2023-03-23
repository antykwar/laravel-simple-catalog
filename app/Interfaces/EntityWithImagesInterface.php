<?php

namespace App\Interfaces;

interface EntityWithImagesInterface
{
    public function getPathToImages(): string;

    public function getImageFilename(): string;
}
