<?php

namespace Kodus\ImageHash;

interface Loader
{
    /**
     * @return int[][]
     */
    public function load($path, $width, $height);
}
