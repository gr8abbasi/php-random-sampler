<?php

namespace Stream\Sampler\Utils;

use Symfony\Component\Console\Input\ArgvInput;

/**
 * CLI InputManager
 */
class InputManager
{
    /**
     * @var string
     */
    private $userInput;

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
        $this->size = $argvInput->getParameterOption(['--size', '-s'], 5);
        $this->is_random = $argvInput->getParameterOption(['--random', '-r'], 0);
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
