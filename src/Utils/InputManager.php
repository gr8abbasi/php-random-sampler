<?php

namespace Stream\Sampler\Utils;

use Symfony\Component\Console\Input\ArgvInput;

/**
 * CLI InputManager
 */
class InputManager
{
    /**
     * @var int
     */
    private $size;

    /**
     * @var bool
     */
    private $is_random;

    /**
     * Setup CLI inputs
     */
    public function __construct(ArgvInput $argvInput)
    {
        $this->size = $argvInput->getParameterOption(['--size', '-s']);
        $this->is_random = $argvInput->getParameterOption(['--random', '-r']);
    }

    /**
     * Format CLI input
     *
     * @return array
     */
    public function getInputData()
    {
        return [
            'size'      => $this->size,
            'is_random' => $this->is_random
        ];
    }
}
