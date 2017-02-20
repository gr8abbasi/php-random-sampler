<?php

namespace Stream\Sampler\Factory;

use Stream\Sampler\Sampler\StreamSampler;

class StreamSamplerFactory implements FactoryInterface
{
    /**
  * @var \Traversable
  */
    private $iterator;

  /**
  * Stream Sampler Factory
  *
  * @param \Traversable $iterator
  */
    public function __construct(\Traversable $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * {@inheritdoc}
     */
   public function create()
   {
       return new StreamSampler($this->iterator);
   }
}
