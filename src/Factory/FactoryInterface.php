<?php

namespace Stream\Sampler\Factory;

/**
 * Describes Factory Interface
 */
interface FactoryInterface
{
    /**
     * @param string $id
     *
     * @return mixed Service
     */
    public function create();
}
