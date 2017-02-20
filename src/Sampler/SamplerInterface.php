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
     * @return array
     */
     public function getSample($size);
}
