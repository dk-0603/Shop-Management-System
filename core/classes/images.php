<?php

class Images
{
    private $imagePaths = [];

    public function addImagePath($path)
    {
        $this->imagePaths[] = $path;
    }

    public function getImagePaths()
    {
        return $this->imagePaths;
    }
}