<?php

namespace Kodus\ImageHash;

interface Loader
{
    /**
     * @return int[][]
     */
    public function load(string $path, int $width, int $height);
}
