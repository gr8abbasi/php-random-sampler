<?php

namespace Stream\Sampler\Utils;

/**
 * RandomGenerator
 */
class RandomGenerator
{
    const DEFAULT_SIZE = 2000;
    /**
     * Generates Random String
     *
     * @param int $size
     *
     * @return string
     */
    public function generateRandomString()
    {
        return base64_encode(random_bytes(self::DEFAULT_SIZE));
    }
}
