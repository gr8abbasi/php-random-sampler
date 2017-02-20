<?php

namespace Stream\Sampler\Factory;

/**
 * Describes Factory Interface
 */
interface FactoryInterface
{
    /**
     * @return mixed Service
     */
    public function create();
}
