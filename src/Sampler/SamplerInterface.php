<?php

namespace Stream\Sampler\Sampler;

/**
 * Describes Sampler Interface
 */
interface SamplerInterface
{
    /**
     * @param int $size
     *
     * @return string
     */
     public function getSample($size);
}
