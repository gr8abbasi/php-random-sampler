<?php

namespace Stream\Sampler\Factory;

use Stream\Sampler\Iterator\StreamIterator;
use Stream\Sampler\Utils\RandomGenerator;

class IteratorFactory implements FactoryInterface
{
    /**
  * @var array
  */
    private $input;

  /**
  * Iterator Factory
  *
  * @param array $input
  */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * {@inheritdoc}
     */
   public function create()
   {
       if ($this->input['is_random']) {
           $randomString = (new RandomGenerator())->generateRandomString();
           $iterator = new \ArrayIterator(str_split($randomString));
       } else {
           $iterator = new StreamIterator('php://stdin');
       }
       return $iterator;
   }
}
